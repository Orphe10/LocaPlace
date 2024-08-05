<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Reservation;

class ArticleAgenceController extends Controller
{
    public function index(Request $request)
    {
        $agence_id = auth('agence')->user()->id;

        $query = Article::where('agence_id', $agence_id);

        if ($request->has('searchorders')) {
            $search = $request->input('searchorders');
            $query->where('libelle', 'like', '%' . $search . '%');
        }

        // Joindre les réservations pour obtenir les informations du client
        $articles = $query->latest()->with('reservation')->get();

        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        // Renvoie la vue 'dashboard.articles.create'
        return view('articles.create');
    }
    // Méthode pour gérer la création d'un article
    public function handlecreate(ArticleRequest $request)
    {
        try {
            // Crée un nouvel article dans la base de données avec les données de la requête

            $article = new Article([
                'libelle' => $request->libelle,
                'price' => $request->price,
                'qte' => $request->qte,
                'type' => $request->type,
                'description' => $request->description,
                'available_from' => $request->available_from,
                'available_until' => $request->available_until,
                'agence_id' => auth('agence')->user()->id,
                'is_approved' => false, // Non approuvé par défaut
            ]);

            // Vérifie si un fichier est présent dans la requête avec la clé 'image'
            if ($request->hasFile('image')) {
                // Chemin vers le fichier, le fichier est stocké dans le dossier spécifié et dans le disque 'public'
                $filePath = $request->file('image')->store('articles', 'public');
                $article->path = $filePath;
            }
            // Sauvegarde l'article dans la base de données
            $article->save();
            // Redirige vers la route 'ArticleIndex' avec un message de succès
            return redirect()->route('ArticleIndex')->with('success', 'Article enregistré avec succès');
        } catch (Exception $e) {
            // Redirige vers la page précédente avec un message d'erreur en cas d'exception
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Méthode pour afficher le formulaire d'édition d'un article
    public function edit(Article $article)
    {
        // Renvoie la vue 'dashboard.articles.edit' avec l'article à éditer
        return view('articles.edit', compact('article'));
    }

    // Méthode pour gérer la mise à jour d'un article
    public function update(Article $article, ArticleRequest $request)
    {
        // dd($article, $request->all()); // Pour vérifier les données

        try {
            // Validez les données reçues
            $validated = $request->validated();

            // Reformatage des dates
            $available_from = Carbon::createFromFormat('Y-m-d\TH:i', $request->available_from)->format('Y-m-d H:i:s');
            $available_until = Carbon::createFromFormat('Y-m-d\TH:i', $request->available_until)->format('Y-m-d H:i:s');

            $article->libelle = $request->libelle;
            $article->type = $request->type;
            $article->qte = $request->qte;
            $article->price = $request->price;
            $article->description = $request->description;
            $article->available_from = $available_from;
            $article->available_until = $available_until;

            if ($request->hasFile('image')) {
                $filePath = $request->file('image')->store('articles', 'public');
                $article->path = $filePath;
            }

            $article->save();

            return redirect()->route('ArticleIndex')->with('success', 'Cet article a été modifié avec succès');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(Article $article)
    {
        try {
            // Supprime l'article de la base de données
            $article->delete();
            // Redirige vers le tableau de bord des vendeurs avec un message de succès
            return redirect()->route('AgenceDashboard')->with('success', 'Article retiré');
        } catch (Exception $e) {
            // Redirige vers la page précédente avec un message d'erreur en cas d'exception
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Nouvelle méthode pour récupérer les données des articles
    public function getArticlesData()
    {
        $addedArticles = Article::where('agence_id', auth('agence')->user()->id)->count();
        $rentedArticles = Article::where('agence_id', auth('agence')->user()->id)->where('statut', 'louer')->count();
        $reservedArticles = Article::where('agence_id', auth('agence')->user()->id)->where('statut', 'reserver')->count();

        return response()->json([
            'addedArticles' => $addedArticles,
            'rentedArticles' => $rentedArticles,
            'reservedArticles' => $reservedArticles,
        ]);
    }

    // Nouvelle méthode pour ajouter un article
    public function addArticle(Request $request)
    {
        $article = new Article([
            'libelle' => 'New Article',
            'agence_id' => auth('agence')->user()->id,
            'statut' => null,
        ]);
        $article->save();

        return response()->json(['success' => true]);
    }

    // Nouvelle méthode pour mettre à jour le statut d'un article
    public function updateArticleStatus(Request $request)
    {
        $status = $request->input('statut');
        $article = Article::where('agence_id', auth('agence')->user()->id)->where('statut', null)->first();
        if ($article) {
            $article->status = $status;
            $article->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
