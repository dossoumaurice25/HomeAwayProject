<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminChambreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AfficherChambresController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PayerController;
use App\Http\Controllers\ProfilLocataire;
use App\Http\Controllers\Proprietaire\ProprietaireDashboardController;
use App\Http\Controllers\ProprietaireAuthController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserAuthControlleur;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



        //Route d'affichage des pages du WebSite
        Route::get('/', [WebsiteController::class,'index'])->name('acceuil');
        Route::get('/home', [WebsiteController::class,'index'])->name('acceuil');
        Route::get('/logement', [WebsiteController::class,'logement'])->name('logement');
        Route::get('/page_con', [WebsiteController::class,'page_con'])->name('page_con');


        Route::get('/louer_chambre', [WebsiteController::class,'chambre_a_louer'])->name('chambre_a_louer');




        //Route d'affichage dees détails d'une chambre en particuliers
        Route::get('/chambres/{id}', [WebsiteController::class, 'show'])->name('chambre_acceuil.show');

        //Route de reservation de chambres
        Route::get('/chambres/{id}/reservation', [ReservationController::class , 'create'])->name('reservation.form');
        Route::post('/reservations' , [ReservationController::class,'store'])->name('reservation.store');
        Route::get('/reservation/locataires', [ReservationController::class, 'indexLocataire'])->name('reservationLocataire.index');
        Route::delete('/reservations/{id}/annulerReservation' , [ReservationController::class , 'annulerReservationLocataire'])->name('reservation.annulerReservationLocataire');


        Route::get('/profil/locataire' , [ProfilLocataire::class, 'profilLocataire'])->name('ProfilLocataire');
        Route::post('/profil/locataire' , [ProfilLocataire::class, 'updateprofilLocataire'])->name('updateProfilLocataire');

        Route::get('/chambre/rechercher', [WebsiteController::class,'search'])->name('chambre.search');

        Route::get('/chambres', [AfficherChambresController::class,'chambres'])->name('chambres');

        Route::middleware('guest')->group(function(){
            //Inscription
            Route::get('/register', [UserAuthControlleur::class,'register'])->name('user.register');
            Route::post('/register', [UserAuthControlleur::class,'handleRegister'])->name('handleUserRegister');
            //Connection
            Route::get('/login', [UserAuthControlleur::class,'login'])->name('user.login');
            Route::post('/login', [UserAuthControlleur::class,'handleLogin'])->name('handleUserLogin');
        });
        //Route pour les utilisateurs connectés
        Route::middleware('auth')->group(function(){
            //Deconnexion
            Route::get('/logout', [UserAuthControlleur::class,'handleLogout'])->name('user.logout');
        });





        //Route pour les proprietaire
            //PROPRIETAITE GUEST [AUTH]
        Route::prefix('proprietaire/account')->group(function () {
                //Routes d'inscription des proprietaire
                Route::get('/login', [ProprietaireAuthController::class, 'login'])->name('proprietaire.login');
                Route::post('/login', [ProprietaireAuthController::class, 'handleLogin'])->name('proprietaire.handleLogin');
                //Routes de connexion des proprietaire
                Route::get('/register', [ProprietaireAuthController::class, 'register'])->name('proprietaire.register');
                Route::post('/register', [ProprietaireAuthController ::class, 'handleRegister'])->name('proprietaire.handleRegister');
        });

        Route::middleware('proprietaire')->prefix('proprietaire/dashboard')->group(function () {
                //Route de dashboard
                Route::get('/', [ProprietaireDashboardController::class, 'index'])->name('ProprietaireDashboard');
                //Route de profil
                Route::get('/profil', [ProprietaireDashboardController::class, 'profil'])->name('ProprietaireProfil');

                // Route::get('/dashboard/profil', [ProprietaireController::class, 'editProfile'])->name('proprietaire.profile');
                Route::put('/profil', [ProprietaireDashboardController::class, 'updateProfile'])->name('proprietaire.updateProfile');

                Route::get('/faq', [ProprietaireDashboardController::class, 'faq'])->name('ProprietaireFaq');

                Route::get('/contact', [ProprietaireDashboardController::class, 'contact'])->name('ProprietaireContact');

                //Route de deconnexion du dashboard qui redirige vers la page de connexion
                Route::get('/logout', [ProprietaireDashboardController::class, 'logout'])->name('ProprietaireLogout');

                Route::get('/reservations' , [ReservationController::class , 'index'])->name('reservation.index');
                Route::delete('/reservations/{id}/annuler' , [ReservationController::class , 'annuler'])->name('reservation.annuler');

                Route::get('paiement', [PayerController::class, 'index'])->name('paiementCommision');

                Route::post('/pay-commission', [PayerController::class, 'payCommission'])->name('commission.pay');

                // Route::get('/paiement', [PaiementController::class, 'index'])->name('paiementProprietaire');
                // Route::get('proprietaire/paiements', [PaiementController::class, 'index'])->name('proprietaires.paiements.index');
                // Route::post('proprietaire/paiements', [PaiementController::class, 'processPayment'])->name('proprietaires.paiements.process');


                //Les routes pour gérer des chambres pour un propriétaire.
                Route::prefix('chambres')->group(function () {
                    // route pour montrer une chambre
                    //Route d'affichage de la liste des chambres.
                    Route::get('/', [ChambreController::class, 'index'])->name('chambre.index');
                    //Route pour la creation d'une chambre
                    Route::get('/show', [ChambreController::class, 'show'])->name('chambre.show');
                    Route::get('/create', [ChambreController::class, 'create'])->name('chambre.create');
                    Route::post('/create', [ChambreController::class, 'handlecreate'])->name('chambre.handleCreate');

                    Route::get('/edit/{chambre}',[ChambreController::class, 'edit'])->name('chambre.edit');
                    Route::put('/update/{chambre}',[ChambreController::class, 'update'])->name('chambre.update');
                    Route::get('/{chambre}',[ChambreController::class, 'delete'])->name('chambre.delete');

                    Route::get('/update_statut/{chambre}',[ChambreController::class, 'updateS'])->name('chambre.up');
                    Route::patch('/{chambre}/update-status', [ChambreController::class, 'updateStatus'])->name('chambres.updateStatus');
                });
        });



        Route::prefix('admin/account')->group(function () {
            //Routes d'inscription de l'Admin
            Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
            Route::post('/login', [AdminAuthController::class, 'handleLogin'])->name('admin.handleLogin');
            Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        });

        Route::middleware('admin')->prefix('admin/')->group( function () {
            Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
            Route::get('paiement', [AdminController::class, 'paiement'])->name('admin.paiement');

            Route::resource('admin/proprietaires', ProprietaireController::class);
            Route::resource('admin/locataires', LocataireController::class);
            Route::post('admin/proprietaires/{id}/toggle', [ProprietaireController::class, 'toggleStatus'])->name('proprietaires.toggle');
            Route::post('admin/locataires/{id}/toggle', [LocataireController::class, 'toggleUserStatus'])->name('locataires.toggle');
            Route::patch('/tenants/{id}/activate', [LocataireController::class, 'activateLocataire'])->name('locataires.activate');
            Route::patch('/tenants/{id}/deactivate', [LocataireController::class, 'deactivateLocataire'])->name('locataires.deactivate');
            Route::get('/admin/chambres', [AdminChambreController::class, 'index'])->name('admin.chambres.index');
            Route::post('/admin/chambres/{id}/approve', [AdminChambreController::class, 'approve'])->name('admin.chambres.approve');
            Route::get('/admin/chambres/approved', [AdminChambreController::class, 'approved'])->name('admin.chambres.approved');
            Route::patch('/admin/chambres/{id}/disapprove', [AdminChambreController::class, 'disapprove'])->name('admin.chambres.disapprove');
        });
