<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function store(Request $request){
    $request->validate([
        'article_id' => 'required|exists:articles,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
    ]);

    Rating::create([
        'user_id' => auth()->id(),
        'article_id' => $request->article_id,
        'rating' => $request->rating,
        'comment' => $request->review,
    ]);

    return redirect()->back()->with('success', 'Merci pour votre évaluation !');
    }

}
