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

	Route::prefix( 'video' )->group( function() {
		Route::get( '/', 'VideoController@index' )->name( 'dash.video.index' );
		Route::get( '/create', 'VideoController@create' )->name( 'dash.video.create' );
		Route::get( '/{video}', 'VideoController@show' )->name( 'dash.video.show' );
		Route::get( '/{video}/edit', 'VideoController@edit' )->name( 'dash.video.edit' );

		Route::post( '/', 'VideoController@store' )->name( 'dash.video.store' );
		Route::patch( '/{video}', 'VideoController@update' )->name( 'dash.video.update' );
		Route::delete( '/{video}', 'VideoController@destroy' )->name( 'dash.video.destroy' );
	});

	Route::prefix( 'course' )->group( function() {
		Route::get( '/', 'CourseController@index' )->name( 'dash.course.index' );
		Route::get( '/create', 'CourseController@create' )->name( 'dash.course.create' );
		Route::get( '/{course}', 'CourseController@show' )->name( 'dash.course.show' );
		Route::get( '/{course}/edit', 'CourseController@edit' )->name( 'dash.course.edit' );

		Route::post( '/', 'CourseController@store' )->name( 'dash.course.store' );
		Route::patch( '/{course}', 'CourseController@update' )->name( 'dash.course.update' );
		Route::delete( '/{course}', 'CourseController@destroy' )->name( 'dash.course.destroy' );
	});

	Route::prefix( 'subcourse' )->group( function() {
		Route::get( '/', 'SubcourseController@index' )->name( 'dash.subcourse.index' );
		Route::get( '/create', 'SubcourseController@create' )->name( 'dash.subcourse.create' );
		Route::get( '/{subcourse}', 'SubcourseController@show' )->name( 'dash.subcourse.show' );
		Route::get( '/{subcourse}/edit', 'SubcourseController@edit' )->name( 'dash.subcourse.edit' );

		Route::post( '/', 'SubcourseController@store' )->name( 'dash.subcourse.store' );
		Route::patch( '/{subcourse}', 'SubcourseController@update' )->name( 'dash.subcourse.update' );
		Route::delete( '/{subcourse}', 'SubcourseController@destroy' )->name( 'dash.subcourse.destroy' );
	});

});
