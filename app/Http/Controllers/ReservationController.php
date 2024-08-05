<?php

namespace App\Http\Controllers;

use App\Models\Payement;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{

    public function index()
    {
        $articles = Article::where('is_approved', true)->get();
        return view('locataire.reservation.reserver', compact('articles'));
    }

    public function store(ReservationRequest $request)
    {
        // Valider les informations de réservation
        $articleId = $request->input('article_id');
        $article = Article::where('id', $articleId)->where('is_approved', true)->first();

        if (!$article) {
            return redirect()->back()->with(
                'error',
                'L\'article n\'est pas disponible pour la réservation.'
            );
        }

        $requestedQte = $request->input('Qte');
        if ($requestedQte > $article->qte) {
            return redirect()->back()->with('error', 'La quantité demandée dépasse la quantité disponible de l\'article.');
        }

        $availableFrom = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $article->available_from
        );
        $availableUntil = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $article->available_until
        );

        $startDate = Carbon::createFromFormat(
            'Y-m-d\TH:i',
            $request->input('start_date')
        )->format('Y-m-d H:i:s');

        $endDate = Carbon::createFromFormat(
            'Y-m-d\TH:i',
            $request->input('end_date')
        )->format('Y-m-d H:i:s');

        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);

        if ($startDate < $availableFrom || $endDate > $availableUntil) {
            return redirect()->back()->with('error', 'Les dates sélectionnées ne sont pas dans l\'intervalle de disponibilité de l\'article.');
        }
        // Stocker la réservation dans la base de données
        $reservation = Reservation::create([
            'article_id' => $article->id,
            'user_id' => auth()->user()->id,
            'Tel' => $request->Tel,
            'Qte' => $requestedQte,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'pending'  // Statut de la réservation en attente de confirmation
        ]);
        $article->statut = 'reserver';
        $article->save();
        // Envoyer un email de confirmation
        Mail::to(auth()->user()->email)->send(new ReservationConfirmation($reservation));

        return redirect()->route('reservation.index')->with('success', 'Réservation effectuée. Veuillez confirmer votre réservation dans les 48 heures.');
    }

    public function confirmReservation($id)
    {
        // Récupérer la réservation de l'article associé
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation non trouvée.');
        }

        $article = Article::find($reservation->article_id);

        if (!$article) {
            return redirect()->back()->with('error', 'Article non trouvé.');
        }

        $reservation->status = 'confirmed';
        $article->statut = 'louer';
        $article->save();
        $reservation->save();

        return redirect()->back()->with('success', 'Réservation confirmée.');
    }

    public function cancelReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $article = Article::find($reservation->article_id);
        $reservation->status = 'canceled';
        $reservation->save();
        $article->statut = NULL;
        $article->save();

        return redirect()->back()->with('success', 'Réservation annulée.');
    }

    public function confirmedArticles()
    {
        $confirmed_articles = Reservation::with('article', 'user')
            ->where('status', 'confirmed')
            ->get();

        $payments = Payement::all();

        return view('agence.articleconfirmer', compact('confirmed_articles', 'payments'));
    }
    public function edit($reservationId)
    {
        // Récupérer la réservation à éditer
        $reservation = Reservation::findOrFail($reservationId);

        // Retourner une vue avec les données de la réservation
        return view('articles.edit', compact('reservation'));
    }
}
