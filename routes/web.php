<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;   //laravel 8.x implique importation du controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');

});

Route::get('/a_propos', function () {
    return view('pages.apropos');

});

Route::get('/services/{nom}/{id}', function ($nom, $id) {
    return "<h1>Bienvenue ".$nom. " votre id ".$id."</h1>";

});


*/

/***************************Routes frontend CLIENT**************************************** */
Route::get('/', [PagesController::class, 'accueil']);
Route::get('/shop', [PagesController::class, 'shop']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/panier', [PagesController::class, 'panier']);
Route::get('/paiement', [PagesController::class, 'paiement']);



/***************************Routes backend ADMIN**************************************** */
Route::get('/admin', [PagesController::class, 'tableauDeBord']);
Route::get('/ajout_categorie', [PagesController::class, 'formCategorie']);


Route::get('/ajout_promotion', [PagesController::class, 'formPromotion']);
Route::get('/ajout_fournisseur', [PagesController::class, 'formFournisseur']);

Route::get('/ajout_publication', [PagesController::class, 'formPublication']);

/***************************Routes backend ADMIN listes des tables**************************************** */

Route::get('/liste_clients', [PagesController::class, 'listeClient']);
Route::get('/liste_fournisseurs', [PagesController::class, 'listeFournisseur']);
Route::get('/liste_commandes', [PagesController::class, 'listeCommande']);
Route::get('/liste_paiements', [PagesController::class, 'listePaiement']);
Route::get('/liste_promotions', [PagesController::class, 'listePromotion']);




/************************************ROUTES CATEGORIE*********************************/

Route::post('/insertion_categorie', [PagesController::class, 'ajoutCategorie']);
Route::get('/liste_categories', [PagesController::class, 'listeCategorie']);
Route::get('/editer_categorie/{id}', [PagesController::class, 'formEditerCategorie']);  // Formulaire
Route::post('/modifier_categorie/{id}', [PagesController::class, 'modifierCategorie']);
Route::get('/supprimer_categorie/{id}', [PagesController::class, 'supprimerCategorie']);  // 


/************************************ROUTES Articles*********************************/
Route::get('/ajout_article', [PagesController::class, 'formArticle']);
Route::post('/insertion_article', [PagesController::class, 'ajoutArticle']);
Route::get('/liste_articles', [PagesController::class, 'listeArticle']);
Route::get('/editer_article/{id}', [PagesController::class, 'formEditerArticle']);  // Formulaire
Route::post('/modifier_article/{id}', [PagesController::class, 'modifierArticle']);
Route::get('/supprimer_article/{id}', [PagesController::class, 'supprimerArticle']);
Route::get('/active_article/{id}', [PagesController::class, 'activeArticle']);
Route::get('/desactive_article/{id}', [PagesController::class, 'desactiveArticle']);
Route::get('/details_article/{id}', [PagesController::class, 'detailsArticle']);
Route::get('/tri_par_categorie/{NOM_CATEGORIE}', [PagesController::class, 'triCategorie']);


Route::get('/voir_article/{id}', [PagesController::class, 'voirArticle']);
/************************************ROUTES PANIER*********************************/
Route::get('/ajouteraupanier/{id}', [PagesController::class, 'ajouterAupanier']);
Route::post('/modifier_quantite/{id}', [PagesController::class, 'modifierQteArticle']);
Route::get('/enlever_du_panier/{id}', [PagesController::class, 'enleverDuPanier']);


/************************************ROUTES Sliders*********************************/
Route::get('/ajout_slider', [PagesController::class, 'formSlider']);
Route::post('/insertion_slider', [PagesController::class, 'ajoutSlider']);
Route::get('/liste_sliders', [PagesController::class, 'listeSliders']);
Route::get('/supprimer_slider/{id}', [PagesController::class, 'supprimerSlider']);
Route::get('/editer_slider/{id}', [PagesController::class, 'formEditerSlider']);  // Formulaire
Route::post('/modifier_slider/{id}', [PagesController::class, 'modifierSlider']);
Route::get('/active_slider/{id}', [PagesController::class, 'activeSlider']);
Route::get('/desactive_slider/{id}', [PagesController::class, 'desactiveSlider']);





/************************************ROUTES CLIENT CONNEXION INSCRIPTION*********************************/
Route::get('/inscription', [PagesController::class, 'formInscription']);
Route::get('/login', [PagesController::class, 'login']); //form de connexion
Route::post('/insertion_client', [PagesController::class, 'insererClient']);
Route::post('/connexion_client', [PagesController::class, 'connexionClient']);
Route::get('/logout', [PagesController::class, 'deconnexionClient']);




Route::post('/connexion', [PagesController::class, 'connexion']);



Route::get('/details', [PagesController::class, 'details']);





/******************************************************************* */

Route::get('/accueil', [PagesController::class, 'welcome']);
Route::get('/home', [PagesController::class, 'home']);
Route::get('/a_propos', [PagesController::class, 'apropos']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/show/{id}', [PagesController::class, 'show']);
Route::get('/create', [PagesController::class, 'formulaireCreate']); // Formulaire
Route::post('/ajout_produit', [PagesController::class, 'ajoutProduit']);
Route::get('/editer_produit/{id}', [PagesController::class, 'formulaireEditer']);  // Formulaire
Route::post('/modifier_produit', [PagesController::class, 'modifierProduit']);
Route::get('/supprimer_produit/{id}', [PagesController::class, 'supprimerProduit']);  // 


//Route::get('/home', 'PagesController@home');   //  /url, NomController@nomfunction    Laravel 7.x
//Route::get('/home', [PagesController::class, 'home']);   //  /url, NomController::class nomfunction   Laravel 8.x
//Route::get('/services/{nom}/{id}', [PagesController::class, 'services']);





