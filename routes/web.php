<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// 1-Important installer laravel collective:  composer require laravelcollective/html 

Route::get('/','ClientController@home');
Route::get('/shop','ClientController@shop');
Route::get('/select_par_cat/{name}','ClientController@select_par_cat');


Route::get('/panier','ClientController@panier');

Route::get('/client_login','ClientController@client_login');

Route::get('/signup','ClientController@signup');

Route::get('/paiment','ClientController@paiement');
Route::get('/ajouter_au_panier/{id}','ClientController@ajouter_au_panier');

Route::post('/modifier_qty/{id}','ClientController@modifier_qty');
Route::get('/retirer_produit/{id}', 'ClientController@retirer_produit');
Route::post('/payer','ClientController@payer'); 




Route::get('/commande','AdminController@commande');

Route::get('/admin','AdminController@dashboard');

Route::get('/ajoutercategorie','CategoryController@ajoutercategorie');
Route::post('/sauvercategorie','CategoryController@sauvercategorie');
Route::get('/categorie','CategoryController@categorie');
Route::get('/edit_categorie/{id}','CategoryController@edit_categorie');
Route::post('/modifiercategorie','CategoryController@modifiercategorie');
Route::get('/supprimercategorie/{id}','CategoryController@supprimercategorie');


Route::get('/ajouterproduit','ProductController@ajouterproduit');
Route::post('/sauverproduit','ProductController@sauverproduit');
Route::get('/produit','ProductController@produit');
Route::get('/edit_produit/{id}','ProductController@edit_produit');
Route::post('/modifierproduit','ProductController@modifierproduit');
Route::get('supprimerproduit/{id}','ProductController@supprimerproduit');
Route::get('/activer_produit/{id}','ProductController@activer_produit');
Route::get('/desactiver_produit/{id}','ProductController@desactiver_produit');

 

Route::get('/ajouterslider','SliderController@ajouterslider');
Route::post('/sauverslider','SliderController@sauverslider');
Route::get('/slider','SliderController@slider');
// Route::post('sauverslider','SliderController@sauverslider');
Route::post('modifierslider','SliderController@modifierslider');
Route::get('edit_slider/{id}','SliderController@edit_slider');
Route::get('supprimer_slider/{id}','SliderController@supprimer_slider');
Route::get('activer_slider/{id}','SliderController@activer_slider');
Route::get('desactiver_slider/{id}','SliderController@desactiver_slider');
