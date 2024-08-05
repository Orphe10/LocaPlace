<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{

    public function show()
    {

        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();


        return view('locataire.show', compact('user', 'reservations'));


    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = User::findOrFail($user->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'num' => [
                'required',
                'string',
                'size:12', // +229 suivi de 8 chiffres donne une taille totale de 12 caractères
                function ($attribute, $value, $fail) {
                    if (!Str::startsWith($value, '+229')) {
                        $fail('Le numéro de téléphone doit commencer par +229.');
                    }
                },
                'regex:/^\+229\d{8}$/', // Vérifie que le numéro correspond au format +229 suivi de 8 chiffres
            ],
        ]);

        $id->update([
            'name' => $request->input('name'),
            'prenom'=>$request->input('prenom'),
            'email' => $request->input('email'),
            'num' => $request->input('num'),
        ]);

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès');
    }
    public function updatePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

         // Log pour vérifier le fichier téléchargé
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');


        // Supprimez l'ancienne image si elle existe
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

         $user->profile_picture = $imagePath;
         $user->id->save();

        // $user->save();

        return redirect()->back()->with('success', 'Photo de profil mise à jour avec succès.');
    }
    public function deletePicture(Request $request)
    {
        $user = Auth::user();

        // Supprimez l'ancienne image si elle existe
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Mettre à jour le chemin de l'image dans la base de données
        $user->profile_picture = null;
        $user->id->save();

        return redirect()->back()->with('success', 'Photo de profil supprimée avec succès.');
    }


}
