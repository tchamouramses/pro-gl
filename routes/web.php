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

Route::group(['middleware' => ['auth']], function () {

	Route::get('/', function () {
	    return view('layouts.app');
	});

	Route::resource('admin/etablissement', 'Etatblissement\EtablissementController')->middleware('permission:etablissement');

	Route::resource('admin/filiere', 'Etatblissement\FiliereController')->middleware('permission:filiere');
	Route::resource('admin/entreprise', 'Entreprise\EntrepriseController')->middleware('permission:entreprise');
	Route::resource('admin/partenariat', 'Etatblissement\PartenariatController')->middleware('permission:partenariat');
	Route::resource('admin/periode-academique', 'Etatblissement\PeriodeAcademiqueController')->middleware('permission:periode-academique');
	Route::resource('admin/etudiant/etudiant', 'Etatblissement\Etudiant\EtudiantController')->middleware('permission:etudiant');
	Route::resource('admin/etudiant/group', 'Etatblissement\Etudiant\GroupController')->middleware('permission:group');
	Route::resource('admin/etudiant/categorie-donnee', 'Etatblissement\Etudiant\CategorieDonneeController')->middleware('permission:categorie-donnee');
	Route::resource('admin/etudiant/donnee', 'Etatblissement\Etudiant\DonneeController')->middleware('permission:donnee');
	Route::resource('admin/stage', 'Entreprise\StageController')->middleware('permission:stage');
	Route::resource('admin/etudiant/postuler', 'Etatblissement\Etudiant\PostulerController')->middleware('permission:postuler');
	Route::resource('admin/statistique-etablissement', 'Etatblissement\StatistiqueEtablissementController')->middleware('permission:statistique-etablissement');
	Route::resource('admin/organisme', 'Etatblissement\OrganismeController')->middleware('permission:organisme');


	Route::resource('admin/user', 'Admin\UserController')->middleware('permission:user');


	Route::get('/home', 'HomeController@index')->name('home');

});