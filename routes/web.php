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

Route::resource('/','IndexController',[

										'only' =>['index'],
										'names' => ['index'=>'home']

										]);
Route::resource('/portfolios','PortfolioController',[
														'parameters'=> [

															'portfolios' => 'alias'

														]
													]);

Route::resource('/articles','ArticlesController',[

													'parameters'=> [

														'articles'=>'alias'

													]

												]);

Route::get('/articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat'])->where('cat_alias','[\w-]+');

Route::resource('comment','CommentController',['only'=>['store']]);


Route::get('contacts/',['uses'=>'ContactController@index','as'=>'contacts']);
Route::post('contacts/',['uses'=>'ContactController@store','as'=>'store']);

/*Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');*/

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(['prefix'=> 'admin','middleware'=>'auth'],function(){

	//admin
	Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);

	Route::resource('/articles','Admin\ArticlesController',[

													'parameters'=> [

														//'articles'=>'articles'

													]

														]);
	Route::resource('/permissions','Admin\PermissionsController');

	Route::resource('/menus','Admin\MenusController');

	Route::resource('/users','Admin\UsersController',[

													'parameters'=> [

														'users'=>'users'

													]

														]);
}); 

