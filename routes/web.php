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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix( 'dashboard' )->namespace( 'Dashboard' )->group( function() {

	Route::get( '/video', 'VideoController@index' )->name( 'dash.video.index' );
	Route::get( '/video/create', 'VideoController@create' )->name( 'dash.video.create' );
	Route::get( '/video/{video}', 'VideoController@show' )->name( 'dash.video.show' );
	Route::get( '/video/{video}/edit', 'VideoController@edit' )->name( 'dash.video.edit' );

	Route::post( '/video', 'VideoController@store' )->name( 'dash.video.store' );
	Route::patch( '/video/{video}', 'VideoController@update' )->name( 'dash.video.update' );
	Route::delete( '/video/{video}', 'VideoController@destroy' )->name( 'dash.video.destroy' );

	Route::get( '/course', 'CourseController@index' )->name( 'dash.course.index' );
	Route::get( '/course/create', 'CourseController@create' )->name( 'dash.course.create' );
	Route::get( '/course/{course}', 'CourseController@show' )->name( 'dash.course.show' );
	Route::get( '/course/{course}/edit', 'CourseController@edit' )->name( 'dash.course.edit' );

	Route::post( '/course', 'CourseController@store' )->name( 'dash.course.store' );
	Route::patch( '/course/{course}', 'CourseController@update' )->name( 'dash.course.update' );
	Route::delete( '/course/{course}', 'CourseController@destroy' )->name( 'dash.course.destroy' );

});
