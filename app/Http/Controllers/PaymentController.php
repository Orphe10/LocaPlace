<?php

namespace App\Http\Controllers;

use FedaPay\FedaPay;
use App\Models\Article;
use App\Models\Payement;
use FedaPay\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\MessagePaiementMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ReservationRequest;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    //Fadapay proccessus de paiement.
    public function makePayment(ReservationRequest $request)
    {
        $articleId = $request->input('article_id');
        $article = Article::where('id', $articleId)->where('is_approved', true)->first();

        if ($article) {
            // Assurez-vous que l'article est bien marqué comme 'louer'
            $article->statut = 'louer';
            $article->save();

            // Envoyer l'email à l'agence
            $agenceEmail = $article->agence->email;
            Mail::to($agenceEmail)->send(new MessagePaiementMail($article));

            // Redirection avec message de succès
            return redirect()->back()->with('success', 'Paiement réussi, l\'article a été loué.');
        } else {
            return redirect()->back()->with('error', 'Échec du paiement. Veuillez réessayer.');
        }
    }
    public function payerCommission(Request $request)
    {
        //dd($request);
        // Logique de traitement du paiement
        $payment = new Payement();
        $payment->article_id = $request->article_id;
        $payment->user_id = $request->user_id;
        $payment->amount = $request->amount;
        $payment->status = 'pending'; // Initialement, le statut est en attente

        // Récupérer l'article en utilisant find() ou first()
        $article = Article::find($request->article_id);
        if ($article) {
            $article->statut = 'louer';
            $article->save();
        } else {
            return redirect()->back()->with('error', 'Article non trouvé.');
        }

        $payment->save();

        return redirect()->back()->with('success', 'Paiement effectué avec succès.');
    }
}
