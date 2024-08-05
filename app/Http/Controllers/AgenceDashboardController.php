<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Agence;
use App\Models\Article;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AgenceModifieRequest;

class AgenceDashboardController extends Controller
{
    public function index()
    {
        return view('agence.dashboard.home');
    }

    public function contenu()
    {
        $agenceId = auth('agence')->user()->id;
        $articles = Article::where('agence_id', $agenceId)->latest()->get();
        $louer = Article::where('statut', 'louer')->where('agence_id', $agenceId)->latest()->get();
        $Nlouer = Article::where('statut', NULL)->where('agence_id', $agenceId)->latest()->get();
        $Reserver = Article::where('statut', 'reserver')->where('agence_id', $agenceId)->latest()->get();
        return view('articles.contenu', compact('articles', 'louer', 'Nlouer', 'Reserver'));
    }

    public function liste()
    {
        $agenceId = auth()->user()->agence_id; // Suppose que l'utilisateur connecté est une agence

        $clients = Reservation::with(['user', 'article'])->get();

        return view('agence.liste', compact('clients'));
    }

    public function profil()
    {
        $id = auth('agence')->user()->id;
        $agences = Agence::where('id', $id)->get();
        return view('agence.profil', compact('agences'));
    }

    public function parametre()
    {
        $id = auth('agence')->user()->id;
        $agence = Agence::where('id', $id)->first();
        return view('agence.parametre', compact('agence'));
    }
    public function updateProfile(AgenceModifieRequest $request)
    {
        try {
            $id = auth('agence')->user()->id;
            $agence = Agence::findOrFail($id);

            $validatedData = $request->validated();

            if ($request->hasFile('image')) {
                // Supprimez l'ancienne image si elle existe
                if ($agence->image) {
                    Storage::disk('public')->delete($agence->image);
                }

                // Téléchargez la nouvelle image
                $path = $request->file('image')->store('agences', 'public');
                $validatedData['image'] = $path;
            }

            // Mettre à jour les informations de l'agence
            $agence->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'num' => $validatedData['num'],
                'image' => $validatedData['image'] ?? $agence->image,
            ]);

            return redirect()->back()->with('success', 'Votre profil a été mis à jour avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function logout()
    {
        Auth::guard('agence')->logout();
        return redirect()->route('AgenceLogin');
    }
}
