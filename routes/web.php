<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebSiteController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\AdminAgenceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\ArticleAgenceController;
use App\Http\Controllers\AgenceDashboardController;

Route::get('/', [WebSiteController::class, 'index'])->name('welcome');
Route::get('/about', [WebSiteController::class, 'about'])->name('about');
Route::get('/contact', [WebSiteController::class, 'contact'])->name('contact');
Route::get('/', [WebSiteController::class, 'index'])->name('home');
Route::get('/Aide & FAQ', [WebSiteController::class, 'aide'])->name('aide');

/*Routes pour les informations de l'utilisateur et la mise à jour des réservations*/
Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::patch('/profile/update', [UserProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/reservations', [ReservationController::class, 'index'])->name('reservations.index')->middleware('auth');
Route::patch('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
Route::patch('/profile/update-picture', [UserProfileController::class, 'updatePicture'])->name('profile.updatePicture');
Route::delete('/profile/delete-picture', [UserProfileController::class, 'deletePicture'])->name('profile.deletePicture');


/*Routes pour notation des articles*/
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
Route::get('/reservations/history', [ReservationController::class, 'history'])->name('reservations.history');


/*Ensemble des routes d'inscription et de connexion des locataires*/
Route::middleware('guest')->group(function () {
    //route d'inscription des locataires
    Route::get('/register', [LocataireController::class, 'register'])->name('LocataireRegister');
    Route::post('/register', [LocataireController::class, 'handleregister'])->name('HandleLocataireRegister');
    //route de connexion des locataire
    Route::get('/login', [LocataireController::class, 'login'])->name('LocataireLogin');
    Route::post('/login', [LocataireController::class, 'handlelogin'])->name('HandleLocataireLogin');
    //route qui permet de réinitialiser le mot de passe d'un locataire .
    Route::get('/mot/de/passe/oublié', [LocataireController::class, 'motdepasseoublie'])->name('MotdepasseLogin');
    Route::post('/mot/de/passe/oublié', [LocataireController::class, 'SendMailLocataire'])->name('SendMotdepasseLogin');
    Route::get('/réinitialisation/mot/de/passe/{email}', [LocataireController::class, 'motpassereinitialise'])->name('MotdepasseReinitialise');
    Route::post('/réinitialisation/mot/de/passe', [LocataireController::class, 'StoreReinitialisation'])->name('SendMotdepasseReinitialise');
    // Routes de réinitialisation de mot de passe d'un propriétaire
    Route::get('/mot/de/passe/oublie', [AgenceController::class, 'motdepasseoublie'])->name('MotdepasseLoginAgence');
    Route::post('/mot/de/passe/oublie', [AgenceController::class, 'SendMailAgence'])->name('SendMotdepasseLoginAgence');
    Route::get('/reinitialisation/{email}', [AgenceController::class, 'motpassereinitialise'])->name('MotdepasseReinitialiseAgence');
    Route::post('/reinitialisation', [AgenceController::class, 'StoreReinitialisation'])->name('SendMotdepasseReinitialiseAgence');
});

/*Route pour la réservation de l'article*/
Route::middleware(['auth'])->group(function () {
    //Route qui affiche l'ensemble des articles ajoutés et approuvés par l'administrateur.
    Route::get('/articles', [WebSiteController::class, 'articles'])->name('articles');
    //Route qui permet de rechercher les articles du cote des locataires .
    Route::get('/search', [WebSiteController::class, 'search'])->name('articles.search');
    //Route qui permet d'avoir plus d'information sur un article.
    Route::get('/infos/{id}', [WebSiteController::class, 'infos'])->name('infos');
    //Route qui permet de louer un article
    Route::post('/payment', [PaymentController::class, 'makePayment'])->name('ArticleMakePayment');
    /*Ensemble des route qui assure la gestion de la reservation d'un article*/
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    //Route de deconnexion d'un utilisateur
    Route::post('/logout', [LocataireController::class, 'handlelogout'])->name('LocataireLogout');
});

/*Ensemble des routes d'inscription et de connexion des agences de location */
Route::prefix('compte/agence')->group(function () {
    //route d'inscription des agences
    Route::get('/register', [AgenceController::class, 'register'])->name('AgenceRegister');
    Route::post('/register', [AgenceController::class, 'handleregister'])->name('HandleAgenceRegister');
    //route de connexion des agences
    Route::get('/login', [AgenceController::class, 'login'])->name('AgenceLogin');
    Route::post('/login', [AgenceController::class, 'handlelogin'])->name('HandleAgenceLogin');
});

/* Ensemble des routes ou les agences doivent se connecter avant d'avoir accès. */
Route::middleware(['auth:agence', 'agence_middleware'])->prefix('agence/dashboard')->group(function () {
    Route::get('/', [AgenceDashboardController::class, 'index'])->name('AgenceContenuDashboard');
    Route::get('/listes/client', [AgenceDashboardController::class, 'liste'])->name('Agence.Listes.Client');
    Route::get('/contenu', [AgenceDashboardController::class, 'contenu'])->name('AgenceDashboard');
    Route::get('/notifications', [MessageController::class, 'getNotifications'])->name('notifications');
    Route::post('/notifications', [MessageController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::get('/profil', [AgenceDashboardController::class, 'profil'])->name('AgenceProfil');
    Route::get('/parametre', [AgenceDashboardController::class, 'parametre'])->name('parametre');
    Route::put('/parametre', [AgenceDashboardController::class, 'updateProfile'])->name('agence.updateProfile');
    Route::post('/message', [MessageController::class, 'store'])->name('envoyer.message');
    Route::get('/article/{id}/confirmer', [ReservationController::class, 'confirmReservation'])->name('confirmReservation');
    Route::get('/article/{id}/annuler', [ReservationController::class, 'cancelReservation'])->name('cancelReservation');
    Route::get('/articles/confirmed', [ReservationController::class, 'confirmedArticles'])->name('articles.confirmed');
    Route::get('/logout', [AgenceDashboardController::class, 'logout'])->name('AgenceLogout');

    // Routes pour les articles
    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleAgenceController::class, 'index'])->name('ArticleIndex');
        Route::get('/create', [ArticleAgenceController::class, 'create'])->name('ArticleCreate');
        Route::post('/create', [ArticleAgenceController::class, 'handlecreate'])->name('ArticleHandleCreate');
        Route::get('/edit/{article}', [ArticleAgenceController::class, 'edit'])->name('ArticleEdit');
        Route::put('/update/{article}', [ArticleAgenceController::class, 'update'])->name('ArticleUpdate');
        Route::get('/{article}', [ArticleAgenceController::class, 'delete'])->name('ArticleDelete');
        Route::post('/payer-commission', [PaymentController::class, 'payerCommission'])->name('payerCommission');
        Route::post('/api/initiate-payment', [PaymentController::class, 'verifyTransaction'])->name('api/initiate-payment');
        Route::get('/articles/edit/{reservation}', [ReservationController::class, 'edit'])->name('ArticleLoueEdit');
    });

    // Routes API pour gérer les articles
    Route::get('/api/getArticlesData', [ArticleAgenceController::class, 'getArticlesData']);
    Route::post('/api/addArticle', [ArticleAgenceController::class, 'addArticle']);
    Route::post('/api/updateArticleStatus', [ArticleAgenceController::class, 'updateArticleStatus']);
});

Route::prefix('administrateur/connexion')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('AdminLogin');
    Route::post('/login', [AdminController::class, 'handlelogin'])->name('HandleAdminLogin');
    //route d'envoie de notification de suggestion et de commentaire d'un locataire pour l'administrateur.
    Route::post('/message', [AdminMessageController::class, 'store'])->name('envoyer.message');
    // Route pour afficher toutes les notifications
    Route::get('/notifications', [AdminMessageController::class, 'index'])->name('admin.notifications.index');
    Route::put('/notifications/{id}', [AdminMessageController::class, 'markAsRead'])->name('admin.notifications.markAsRead');
});

Route::middleware(['auth:admin', 'administrateur_middleware'])->prefix('admin')->group(function () {
    //Route pour afficher le dashboard d'administration.
    Route::get('/', [AdminController::class, 'index'])->name('DashboardAdmin');
    //Route pour approuver un article.
    Route::post('/approve/{article}', [AdminController::class, 'approveArticle'])->name('admin.approve');
    Route::get('/article/{article}/disapprove', [AdminController::class, 'disapproveArticle'])->name('disapproveArticle');
    //Route pour rejeter un article.
    Route::post('/reject/{article}', [AdminController::class, 'rejectArticle'])->name('admin.reject');
    //Route pour afficher tous les articles avant l'activation ou la desactivation d'un agence.
    Route::get('/propriétaires/listes', [AdminAgenceController::class, 'index'])->name('admin.agences.index');
    Route::get('/article/approuve', [AdminAgenceController::class, 'articleapprouve'])->name('admin.article.approuve');
    Route::get('/locataire/listes', [AdminAgenceController::class, 'locaaireliste'])->name('admin.locataire.liste');
    //route qui permet d'afficher la liste de tout les commissions payés par les proprétaires.
    Route::get('/paiement/listes', [AdminAgenceController::class, 'paiement'])->name('admin.paiement');
    Route::get('/article/attente', [AdminAgenceController::class, 'articleattente'])->name('admin.article.attente');
    //Desactivation du compte des locataires.
    Route::post('/utilisateur/{id}/activation', [LocataireController::class, 'toggleActivation'])->name('ActivationUtilisateur');
    //Route qui mene vers la fonction qui excecute cette derniere.
    Route::patch('/active/{agence}', [AdminAgenceController::class, 'activation'])->name('admin.agences.active');
    //Route de deconnexion d'une agence une fois connecté.
    Route::get('/logout', [AgenceDashboardController::class, 'logout'])->name('AdminLogout');
});
