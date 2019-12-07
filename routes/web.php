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
Route::get('/add-client', 'GestionnaireController@indexClient')->name('add-client');
Route::post('/add-client', 'GestionnaireController@addClient');
Route::get('/add-produit', 'GestionnaireController@indexProduit')->name('add-produit');
Route::post('/add-produit', 'GestionnaireController@addProduit');
// Route::post('add-gest', 'AdminController@addGest');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
