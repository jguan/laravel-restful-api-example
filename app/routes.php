<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind(
    'Repositories\MovieRepositoryInterface',
    'Repositories\EloquentMovieRepository'
);

# throw a 404 error for any url that isn't specified
Route::any( '(.*)', function()
{
    App::abort(404);

});

Route::group(array('before' => 'basic.once'), function()
{
    Route::resource('cinemas', 'CinemaController');
    Route::resource('movies', 'MovieController');
    Route::get('cinemas/{name}/{date}', 'CinemaController@showMovies');
    Route::get('cinemas/location/{latitude}/{longitude}/{radius?}', 'CinemaController@locateCinemas');
});