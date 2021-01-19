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


Auth::routes();


Route::get('/', function () {
    return view('layouts.app');
});



Route::resource('admin/etablissement', 'Etatblissement\EtablissementController');

Route::resource('admin/filiere', 'Etatblissement\FiliereController');
Route::resource('admin/entreprise', 'Entreprise\EntrepriseController');
Route::resource('admin/partenariat', 'Etatblissement\PartenariatController');
Route::resource('admin/periode-academique', 'Etatblissement\PeriodeAcademiqueController');
Route::resource('admin/etudiant/etudiant', 'Etatblissement\Etudiant\EtudiantController');
Route::resource('admin/etudiant/group', 'Etatblissement\Etudiant\GroupController');
Route::resource('admin/etudiant/categorie-donnee', 'Etatblissement\Etudiant\CategorieDonneeController');
Route::resource('admin/etudiant/donnee', 'Etatblissement\Etudiant\DonneeController');
Route::resource('admin/stage', 'Entreprise\StageController');
Route::resource('admin/etudiant/postuler', 'Etatblissement\Etudiant\PostulerController');
Route::resource('admin/statistique-etablissement', 'Etatblissement\StatistiqueEtablissementController');
Route::resource('admin/organisme', 'Etatblissement\OrganismeController');


Route::get('/home', 'HomeController@index')->name('home');
