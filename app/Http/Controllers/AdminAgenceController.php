<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agence;
use App\Models\Article;
use App\Models\Payement;
use Illuminate\Http\Request;

class AdminAgenceController extends Controller
{
    /**
     * Affiche la liste des agences avec leurs statuts d'activation.
     */
    public function index()
    {
        $agences = Agence::all();
        return view('admin.liste', compact('agences'));
    }

    public function articleattente(){
        $articles = Article::where('is_approved', false)->get();
        return view('admin.attente', compact('articles'));
    }

    public function articleapprouve(){
        $articles = Article::where('is_approved', true)->get();
        return view('admin.approuve', compact('articles'));
    }
    public function locaaireliste(){
        $locataire = User::all();
        return view('admin.locataireliste', compact('locataire'));
    }

    public function paiement(){
        $payments = Payement::with('article.agence')->get();
        return view('admin.paiement', compact('payments'));
    }

    /**
     * Active ou désactive une agence.
     */
    public function activation($id)
    {
        // Utilisez findOrFail pour récupérer un modèle spécifique
        $agence = Agence::findOrFail($id);
        if ($agence) {
            // Vérifiez que le modèle a bien été trouvé et accédez à la propriété
            $agence->is_active = !$agence->is_active;
            $agence->save();
            return redirect()->back()->with('success', 'Le statut de l\'agence a été mis à jour.');
        }
        return redirect()->back()->with('success', 'Le statut de l\'agence n\'a été mis à jour.');
    }
}
