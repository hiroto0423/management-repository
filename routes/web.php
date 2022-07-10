<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;


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


 Route::get('/groups', 'GroupController@index');
 Route::get('/groups/create','GroupController@create');
 Route::get('/groups/{group}','GroupController@show');
 Route::put('/groups/{group}','GroupController@update');
 Route::delete('/groups/{group}','GroupController@destroy');
 Route::get('/groups/{group}/edit','GroupController@edit');
 Route::post('/groups','GroupController@store');
 Route::get('/groups/{group}/event','GroupController@event');

 

 
 Route::get('/users','UserController@index');
 Route::get('/users/{user}/invited','UserController@invited');
 Route::get('/users/{user}/followingusers','UserController@follow_index');
 Route::get('/users/{user}/followedusers','UserController@followed_index');
 Route::get('/users/{user}/invite','UserController@invite');
 Route::put('/users/{user}','UserController@invited_post');
 Route::delete('/users/{user}/invited','UserController@invited_delete');
 Route::post('/users/{user}/invited','UserController@invited_comfirmed');
 
 
 Route::get('/users/{user}','UserController@show');
 Route::get('/top/{user}','UserController@profile_show');
 
 Route::post('/users/{user}/follow', 'UserController@follow')->name('follow');
 Route::post('/users/{user}/unfollow', 'UserController@unfollow')->name('unfollow');
 
 Route::post('/event_attend','UserController@event_attend');
 Route::post('/event_unattend','UserController@event_unattend');

 Route::get('/top','EventController@index');
 Route::get('/top/event/create','EventController@create');
 Route::get('/top/event/{event}','EventController@show');
 Route::put('/top/event/{event}','EventController@update');
 Route::post('/top','EventController@store');
 Route::get('/top/event/{event}/edit','EventController@edit');
 

 
 Route::get('/top/{user}/create','UserController@profile_create');
 Route::get('/top/{user}/edit','UserController@profile_edit');
 Route::put('/top/{user}','UserController@profile_update');
 Route::delete('/top/{user}','UserController@profile_destroy');
 Route::get('top/{user}/groups','UserController@profile_groups');
 
 Route::post('/top/{user}','UserController@profile_store');
     
 Route::get('/test','EventController@google_calendar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
