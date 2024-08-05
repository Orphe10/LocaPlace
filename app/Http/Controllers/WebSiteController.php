<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebSiteController extends Controller
{
    public function index()
    {
        // Admin::create([
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin')
        // ]);
        return view('welcome');
    }
    public function about()
    {
        return view('pages.about.about');
    }
    public function contact()
    {
        return view('pages.contact.contact');
    }
    public function articles()
    {
        $articles = Article::where('is_approved', true)->get();
        return view('pages.articles.articles', compact('articles'));
    }
    public function search(Request $request)
    {
        $query = Article::query();

        if ($request->filled('objet')) {
            $query->where('libelle', 'like', '%' . $request->input('objet') . '%');
        }

        if ($request->filled('category') && $request->input('category') != 'Catégorie...') {
            $query->where('type', $request->input('category'));
        }

        $articles = $query->get();

        return view('pages.articles.articles', compact('articles'));
    }
    public function infos($id)
    {
        $article = Article::with('Agence')->findOrFail($id);
        return view('pages.articles.infos', compact('article'));
    }
    public function aide()
    {
        return view('Aide & FAQ.Aide&FAQs');
    }



}
