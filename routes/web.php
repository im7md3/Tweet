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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* ============================================== Tweets ==================================== */
Route::group(['prefix' => 'tweets', 'middleware' => 'auth'], function () {
    Route::get('/', 'TweetController@index')->name('home');
    Route::post('/', 'TweetController@insert')->name('insertTweet');
    Route::post('/{id}/like','TweetLikeController@store')->name('like');
    Route::delete('/{id}/like','TweetLikeController@destroy')->name('dislike');
});

/* ============================================== profiles ==================================== */

Route::group(['prefix' => 'profiles', 'middleware' => 'auth'], function () {
    Route::get('{user:username}', 'profilesController@show')->name('profile');
    Route::post('{user:username}/follow', 'FollowController@store')->name('follow-user');
    Route::get('{user:username}/edit', 'profilesController@edit')->name('edit')->middleware('can:edit,user');
    Route::patch('{user:username}', 'profilesController@update')->name('update')->middleware('can:edit,user');
});

/* ============================================== profiles ==================================== */
Route::get('/explore','ExploreController@index')->name('explore');
