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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/upload',[
// 	'as'=>'accueil',
// 	'uses'=>'BasesController@upload',
// ]);
Route::get('/',[
	'as'=>'home',
	'uses'=>'BasesController@index',
]);

/*-------------------------------*\
| Routes Agent
\*-------------------------------*/
Route::get('/agents',[
	'as'=>'agent.index',
	'uses'=>'AgentsController@index',
]);

Route::get('/agents/ajouter',[
	'as'=>'agent.create',
	'uses'=>'AgentsController@create',
]);

Route::post('/agents/ajouter',[
	'as'=>'agent.store',
	'uses'=>'AgentsController@store',
]);

Route::get('/agents/modifier/{id}',[
	'as'=>'agent.edit',
	'uses'=>'AgentsController@edit',
]);

Route::patch('/agents/modifier/{id}',[
	'as'=>'agent.update',
	'uses'=>'AgentsController@update',
]);

Route::delete('/agents/supprimer/{id}',[
	'as'=>'agent.destroy',
	'uses'=>'AgentsController@destroy',
]);
/*-------------------------------*\
| Routes Site
\*-------------------------------*/
Route::get('/sites',[
	'as'=>'site.index',
	'uses'=>'SitesController@index',
]);

Route::get('/sites/ajouter',[
	'as'=>'site.create',
	'uses'=>'SitesController@create',
]);

Route::post('/sites/ajouter',[
	'as'=>'site.store',
	'uses'=>'SitesController@store',
]);

Route::get('/sites/modifier/{id}',[
	'as'=>'site.edit',
	'uses'=>'SitesController@edit',
]);

Route::patch('/sites/modifier/{id}',[
	'as'=>'site.update',
	'uses'=>'SitesController@update',
]);

Route::delete('/sites/supprimer/{id}',[
	'as'=>'site.destroy',
	'uses'=>'SitesController@destroy',
]);

/*-------------------------------*\
| Routes Conge
\*-------------------------------*/
Route::get('/conges',[
	'as'=>'conge.index',
	'uses'=>'CongesController@index',
]);

Route::get('/conges/ajouter',[
	'as'=>'conge.create',
	'uses'=>'CongesController@create',
]);

Route::post('/conges/ajouter',[
	'as'=>'conge.store',
	'uses'=>'CongesController@store',
]);

Route::get('/conges/modifier/{id}',[
	'as'=>'conge.edit',
	'uses'=>'CongesController@edit',
]);

Route::patch('/conges/modifier/{id}',[
	'as'=>'conge.update',
	'uses'=>'CongesController@update',
]);


Route::delete('/conges/supprimer/{id}',[
	'as'=>'conge.destroy',
	'uses'=>'CongesController@destroy',
]);

/*-------------------------------*\
| Routes Absence
\*-------------------------------*/
Route::get('/absence',[
	'as'=>'absence.index',
	'uses'=>'AbsencesController@index',
]);

Route::get('/absence/ajouter',[
	'as'=>'absence.create',
	'uses'=>'AbsencesController@create',
]);

Route::post('/absence/ajouter',[
	'as'=>'absence.store',
	'uses'=>'AbsencesController@store',
]);

/*-------------------------------*\
| Routes Planing
\*-------------------------------*/
//Plannings Provisoires
Route::get('/planning/provisoires',[
	'as'=>'planning.index',
	'uses'=>'PlanningController@index',
]);

Route::get('/planning/provisoires/creer',[
	'as'=>'planning.create',
	'uses'=>'PlanningController@create',
]);

Route::get('/planning/provisoires/voir/{id}',[
	'as'=>'planning.show',
	'uses'=>'PlanningController@show',
]);
Route::post('/planning/provisoires/creer',[
	'as'=>'planning.store',
	'uses'=>'PlanningController@store',
]);

Route::get('/planning/provisoires/modifier/{id}',[
	'as'=>'planning.edit',
	'uses'=>'PlanningController@edit',
]);

Route::patch('/planning/provisoires/modifier/{id}',[
	'as'=>'planning.update',
	'uses'=>'PlanningController@update',
]);

Route::delete('/planning/provisoires/supprimer/{id}',[
	'as'=>'planning.destroy',
	'uses'=>'PlanningController@destroy',
]);
//Plannings Definitives
Route::get('/planning/definitives',[
	'as'=>'planning.index_definitives',
	'uses'=>'PlanningController@index_definitives',
]);
//Plannings Definitives
Route::get('/planning/archives',[
	'as'=>'planning.index_archive',
	'uses'=>'PlanningController@index_archive',
]);

//Search Planning Provisoire
Route::post('/planning/search',[
	'as'=>'planning.search_planning',
	'uses'=>'PlanningController@search_planning',
]);