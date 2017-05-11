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

Route::pattern('id', '([0-9]+)');
Route::pattern('slug', '(.)+');


Route::group(['namespace' => 'FrontEnd'], function(){
	Route::get('', ['as' => 'frontend.home.index', 'uses' => 'HomeController@index']);
	Route::get('{slug}-{id}.html', ['as' => 'frontend.post.show', 'uses' => 'PostController@show']);
	Route::get('{slug}-{id}', ['as' => 'frontend.category.show', 'uses' => 'PostController@category']);
	Route::get('lien-he', ['as' => 'frontend.contact.contact', 'uses' => 'ContactController@contact']);
	Route::post('lien-he', ['as' => 'frontend.contact.contact', 'uses' => 'ContactController@postContact']);
	Route::get('about-me', ['as' => 'frontend.contact.aboutme', 'uses' => 'ContactController@aboutme']);
});	


Route::group(['namespace' => 'BackEnd', 'prefix' => 'admincp', 'middleware' => 'auth'], function(){
	Route::get('', ['as' => 'backend.home.index', 'uses' => 'PostController@index']);

	Route::group(['prefix' => 'chuyen-muc'], function(){
		Route::get('', ['as' => 'backend.category.index', 'uses' => 'CategoryController@index']);

		Route::get('create', ['as' => 'backend.category.create', 'uses' => 'CategoryController@create']);
		Route::post('create', ['as' => 'backend.category.create', 'uses' => 'CategoryController@store']);
		
		Route::get('{id}', ['as' => 'backend.category.show', 'uses' => 'CategoryController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.category.update', 'uses' => 'CategoryController@edit']);
		Route::post('update/{id}', ['as' => 'backend.category.update', 'uses' => 'CategoryController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.category.destroy', 'uses' => 'CategoryController@destroy']);
	});

	Route::group(['prefix' => 'trich-dan'], function(){
		Route::get('', ['as' => 'backend.quotes.index', 'uses' => 'QuoteController@index']);

		Route::get('create', ['as' => 'backend.quotes.create', 'uses' => 'QuoteController@create']);
		Route::post('create', ['as' => 'backend.quotes.create', 'uses' => 'QuoteController@store']);
		
		Route::get('{id}', ['as' => 'backend.quotes.show', 'uses' => 'QuoteController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.quotes.update', 'uses' => 'QuoteController@edit']);
		Route::post('update/{id}', ['as' => 'backend.quotes.update', 'uses' => 'QuoteController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.quotes.destroy', 'uses' => 'QuoteController@destroy']);
	});

	Route::group(['prefix' => 'quang-cao'], function(){
		Route::get('', ['as' => 'backend.ads.index', 'uses' => 'AdsController@index']);

		Route::get('create', ['as' => 'backend.ads.create', 'uses' => 'AdsController@create']);
		Route::post('create', ['as' => 'backend.ads.create', 'uses' => 'AdsController@store']);
		
		Route::get('{id}', ['as' => 'backend.ads.show', 'uses' => 'AdsController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.ads.update', 'uses' => 'AdsController@edit']);
		Route::post('update/{id}', ['as' => 'backend.ads.update', 'uses' => 'AdsController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.ads.destroy', 'uses' => 'AdsController@destroy']);
	});

	Route::group(['prefix' => 'bai-viet'], function(){
		Route::get('', ['as' => 'backend.post.index', 'uses' => 'PostController@index']);

		Route::get('create', ['as' => 'backend.post.create', 'uses' => 'PostController@create']);
		Route::post('create', ['as' => 'backend.post.create', 'uses' => 'PostController@store']);
		
		Route::get('{id}', ['as' => 'backend.post.show', 'uses' => 'PostController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.post.update', 'uses' => 'PostController@edit']);
		Route::post('update/{id}', ['as' => 'backend.post.update', 'uses' => 'PostController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.post.destroy', 'uses' => 'PostController@destroy']);
	});

	Route::group(['prefix' => 'du-an'], function(){
		Route::get('', ['as' => 'backend.project.index', 'uses' => 'ProjectController@index']);

		Route::get('create', ['as' => 'backend.project.create', 'uses' => 'ProjectController@create']);
		Route::post('create', ['as' => 'backend.project.create', 'uses' => 'ProjectController@store']);
		
		Route::get('{id}', ['as' => 'backend.project.show', 'uses' => 'ProjectController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.project.update', 'uses' => 'ProjectController@edit']);
		Route::post('update/{id}', ['as' => 'backend.project.update', 'uses' => 'ProjectController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.project.destroy', 'uses' => 'ProjectController@destroy']);
	});

	Route::group(['prefix' => 'ky-nang'], function(){
		Route::get('', ['as' => 'backend.skill.index', 'uses' => 'SkillController@index']);

		Route::get('create', ['as' => 'backend.skill.create', 'uses' => 'SkillController@create']);
		Route::post('create', ['as' => 'backend.skill.create', 'uses' => 'SkillController@store']);
		
		Route::get('{id}', ['as' => 'backend.skill.show', 'uses' => 'SkillController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.skill.update', 'uses' => 'SkillController@edit']);
		Route::post('update/{id}', ['as' => 'backend.skill.update', 'uses' => 'SkillController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.skill.destroy', 'uses' => 'SkillController@destroy']);
	});

	Route::group(['prefix' => 'slider'], function(){
		Route::get('', ['as' => 'backend.slider.index', 'uses' => 'SliderController@index']);

		Route::get('create', ['as' => 'backend.slider.create', 'uses' => 'SliderController@create']);
		Route::post('create', ['as' => 'backend.slider.create', 'uses' => 'SliderController@store']);
		
		Route::get('{id}', ['as' => 'backend.slider.show', 'uses' => 'SliderController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.slider.update', 'uses' => 'SliderController@edit']);
		Route::post('update/{id}', ['as' => 'backend.slider.update', 'uses' => 'SliderController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.slider.destroy', 'uses' => 'SliderController@destroy']);
	});

	Route::group(['prefix' => 'quan-tri-vien'], function(){
		Route::get('', ['as' => 'backend.user.index', 'uses' => 'UserController@index']);

		Route::get('create', ['as' => 'backend.user.create', 'uses' => 'UserController@create']);
		Route::post('create', ['as' => 'backend.user.create', 'uses' => 'UserController@store']);
		
		Route::get('{id}', ['as' => 'backend.user.show', 'uses' => 'UserController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.user.update', 'uses' => 'UserController@edit']);
		Route::post('update/{id}', ['as' => 'backend.user.update', 'uses' => 'UserController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.user.destroy', 'uses' => 'UserController@destroy']);
	});

	Route::group(['prefix' => 'viec-lam'], function(){
		Route::get('', ['as' => 'backend.work.index', 'uses' => 'WorkController@index']);

		Route::get('create', ['as' => 'backend.work.create', 'uses' => 'WorkController@create']);
		Route::post('create', ['as' => 'backend.work.create', 'uses' => 'WorkController@store']);
		
		Route::get('{id}', ['as' => 'backend.work.show', 'uses' => 'WorkController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.work.update', 'uses' => 'WorkController@edit']);
		Route::post('update/{id}', ['as' => 'backend.work.update', 'uses' => 'WorkController@update']);
		
		Route::get('delete/{id}', ['as' => 'backend.work.destroy', 'uses' => 'WorkController@destroy']);
	});

	Route::group(['prefix' => 'mang-xa-hoi'], function(){
		Route::get('', ['as' => 'backend.info.index', 'uses' => 'InfoController@index']);
		
		Route::get('{id}', ['as' => 'backend.info.show', 'uses' => 'InfoController@show']);
		
		Route::get('update/{id}', ['as' => 'backend.info.update', 'uses' => 'InfoController@edit']);
		Route::post('update/{id}', ['as' => 'backend.info.update', 'uses' => 'InfoController@update']);
	});

	Route::group(['prefix' => 'lien-he'], function(){
		Route::get('', ['as' => 'backend.contact.index', 'uses' => 'ContactController@index']);
		
		Route::get('{id}', ['as' => 'backend.contact.show', 'uses' => 'ContactController@show']);
		
		Route::get('delete/{id}', ['as' => 'backend.contact.destroy', 'uses' => 'ContactController@destroy']);
	});
});

Route::group(['namespace' => 'Auth'], function() {
	Route::get('login', ['as'  => 'login', 'uses' => 'AuthController@showLoginForm']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});
