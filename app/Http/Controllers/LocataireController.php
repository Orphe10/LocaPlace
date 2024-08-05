<?php

namespace App\Http\Controllers;

use App\Models\ReinitialisationModel;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LocataireLoginRequest;
use App\Notifications\MotDePassNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\RéinitialisationRequest;
use App\Http\Requests\LocataireRegisterRequest;

class LocataireController extends Controller
{
    public function register()
    {
        return view('locataire.register');
    }

    public function handleregister(LocataireRegisterRequest $request)
    {
        try {
            // Retirer le préfixe +229 avant de sauvegarder
            $num = str_replace('+229', '', $request->num);

            User::create([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'num' => $num, // Sauvegarde du numéro sans le préfixe
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('LocataireLogin')->with('success', 'Votre compte a été créé, connectez-vous');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function login()
    {
        return view('locataire.login');
    }
    public function handlelogin(LocataireLoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if ($user && !$user->is_active) {
                return redirect()->back()->with('error', 'Votre compte a été désactivé par l\'administrateur');
            }
            if (auth()->attempt($request->only('email', 'password'))) {
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Information de connecxion non reconnu.');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function toggleActivation($id)
    {
        // Utilisez findOrFail pour récupérer un modèle spécifique
        $user = User::findOrFail($id);
        // Vérifiez que le modèle a bien été trouvé et accédez à la propriété
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->back()->with('success', 'Le statut de l\'utilisateur a été mis à jour.');
    }

    //Fonction qui permet d'envoyer le formulaire pour que le locataire entre son email.
    public function motdepasseoublie()
    {
        return view('locataire.passe');
    }
    //Fonction qui permet d'envoyer de code de réinitialisation de mot de passe du locataire.
    public function SendMailLocataire(Request $request)
    {
        try {
            if ($request) {
                $code = rand(1000, 4000);
                $data = [
                    'code' => $code,
                    'email' => $request->email,
                ];
                ReinitialisationModel::create($data);
                Notification::route('mail', $request->email)->notify(new MotDePassNotification($code, $request->email,));
                return redirect()->back()->with('success', 'Notification envoyé avec success');
            } else {
                return redirect()->back()->with('error', 'L\'envoie de la notification a été échoué');
            }
        } catch (Exception $e) {
            // throw new Exception("Failed to send email notification");
            dd($e);
        }
    }

    //Fonction qui permet d'envoyer le formulaire pour que le locataire entre son email.
    public function motpassereinitialise($email)
    {
        $mail = User::where('email', $email)->first();
        if ($mail) {
            return view('locataire.reinitisepasse', compact('email'));
        } else {
            return redirect()->route('LocataireLogin');
        }
    }

    public function StoreReinitialisation(Request $request)
    {
        try {
            // Valider les données entrantes
            $request->validate([
                'email' => 'required|email',
                'code' => 'required|string',
                'password' => 'required|string|confirmed',
            ], [
                'email.required' => 'L\'adresse e-mail est obligatoire.',
                'email.email' => 'L\'adresse e-mail doit être une adresse e-mail valide.',
                'code.required' => 'Le code de réinitialisation est obligatoire.',
                'code.string' => 'Le code de réinitialisation doit être un entier.',
                'password.required' => 'Le mot de passe est obligatoire.',
                'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]);

            // Vérifiez si le code correspond
            $reset = ReinitialisationModel::where([
                ['email', $request->email],
                ['code', $request->code]
            ])->first();

            if (!$reset) {
                return back()->withErrors(['code' => 'Le code est invalide.']);
            }

            // Réinitialiser le mot de passe
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();

                // Supprimer l'entrée de la table password_resets
                ReinitialisationModel::where(['email' => $request->email])->delete();

                return redirect()->route('LocataireLogin')->with('success', 'Votre mot de passe a été réinitialisé avec succès!');
            } else {
                return back()->withErrors(['email' => 'Aucun utilisateur trouvé avec cet email.']);
            }
        } catch (Exception $th) {
            dd($th);
        }
    }
    public function handlelogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
