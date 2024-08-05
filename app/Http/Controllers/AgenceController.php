<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ReinitialisationModel;
use App\Http\Requests\AgenceLoginRequest;
use App\Http\Requests\AgenceRegisterRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MotDePassNotificationAgence;

class AgenceController extends Controller
{
    public function register()
    {
        return view('agence.register');
    }

    public function handleregister(AgenceRegisterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('agences', 'public');
                $validatedData['image'] = $path;
            }

            Agence::create([
                'name' => $request->name,
                'email' => $request->email,
                'num' => $request->num,
                'image' => $validatedData['image'] ?? null,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('AgenceLogin')->with('success', 'Votre compte a été créé, connectez-vous');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function login()
    {
        return view('agence.login');
    }

    public function handlelogin(AgenceLoginRequest $request)
    {
        try {
            if (auth('agence')->attempt($request->only('email', 'password'))) {
                return redirect()->route('AgenceDashboard');
            } else {
                return redirect()->back()->with('error', 'Informations de connexion non reconnues.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //Fonction qui permet d'envoyer le formulaire pour que le locataire entre son email.
    public function motdepasseoublie()
    {
        return view('agence.passe');
    }
    //Fonction qui permet d'envoyer de code de réinitialisation de mot de passe du locataire.
    public function SendMailAgence(Request $request)
    {

        try {
            if ($request) {
                $code = rand(1000, 4000);
                $data = [
                    'code' => $code,
                    'email' => $request->email,
                ];
                ReinitialisationModel::create($data);
                Notification::route('mail', $request->email)->notify(new MotDePassNotificationAgence($code, $request->email,));
                return redirect()->back()->with('success', 'Notification envoyé avec success');
            } else {
                return redirect()->back()->with('error', 'L\'envoie de la notification a été échoué');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function motpassereinitialise($email)
    {
        $mail = Agence::where('email', $email)->first();
        if ($mail) {
            return view('agence.reinitiapasse', compact('email'));
        } else {
            return redirect()->route('AgenceLogin');
        }
    }

    public function StoreReinitialisation(Request $request)
    {
        try {
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
                return back()->with(['error' => 'Le code est invalide.']);
            }

            // Réinitialiser le mot de passe
            $proprietaire = Agence::where('email', $request->email)->first();

            if ($proprietaire) {
                $proprietaire->password = Hash::make($request->password);
                $proprietaire->save();
                // Supprimer l'entrée de la table password_resets
                ReinitialisationModel::where(['email' => $request->email])->delete();
                return redirect()->route('AgenceLogin')->with('success', 'Votre mot de passe a été réinitialisé avec succès!');
            } else {
                return back()->with(['error' => 'Aucun utilisateur trouvé avec cet email.']);
            }
        } catch (Exception $th) {
            dd($th);
        }
    }
}
