<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;

use App\Models\Agence;
use App\Models\Article;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        $articles = Article::where('is_approved', false)->get();
        $prope = Agence::all();
        $locataire = User::all();
        $dispo = Article::all();
        $louer = Article::where('statut', 'louer')->get();

        return view('admin.contenu',compact('articles','prope','louer','locataire','dispo'));
    }
    public function approveArticle(Article $article){
        // Trouve l'article par son ID
        $id = Article::where('id', $article->id)->first();
        // Définit l'article comme approuvé
        $id->is_approved = true;
        // Enregistre les modifications
        $id->save();

        // Redirige vers la liste des articles en attente avec un message de succès
        return redirect()->back()->with('success', 'Article approuvé avec succès.');
    }

    public function disapproveArticle(Article $article)
    {
        // Trouve l'article par son ID
        $id = Article::where('id', $article->id)->first();
        // Définit l'article comme non approuvé
        $id->is_approved = false;
        // Enregistre les modifications
        $id->save();

        // Redirige vers la liste des articles en attente avec un message de succès
        return redirect()->back()->with('success', 'Article désapprouvé avec succès.');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function handlelogin(AdminRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (auth('admin')->attempt($credentials)) {
                return redirect()->route('DashboardAdmin');
            } else {
                return redirect()->back()->with('error', 'Information de connexion non reconnue.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function rejectArticle(Article $article)
    {
        // Trouve l'article par son ID
        $id = Article::where('id', $article->id)->first();
        // Supprime l'article
        $id->delete();

        // Redirige vers la liste des articles en attente avec un message de succès
        return redirect()->back()->with('success', 'Article refusé et supprimé avec succès.');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('AdminLogin');
    }

}
