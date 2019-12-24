<?php

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




Route::get('/', 'HomeController@index')->name('home');

//GESTIONNAIRE PAGES
// Route::resource('clients', 'GestionnaireController@indexListClients');
Route::resource('clients', 'ClientController');
Route::resource('produits', 'ProduitController');
Route::resource('fournisseurs', 'FournisseurController');

Route::get('/add-fournisseur', 'GestionnaireController@indexFournisseur')->name('add-fournisseur');
Route::post('/add-fournisseur', 'GestionnaireController@addFournisseur');
// Route::get('/add-produit', 'GestionnaireController@indexProduit')->name('add-produit');
// Route::post('/add-produit', 'GestionnaireController@addProduit');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
