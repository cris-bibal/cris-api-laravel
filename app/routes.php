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

Route::get('/', function()
{
  return Redirect::route('user-get');
});

//route to get the list of all users
Route::get('cris-rest-api/get/users',
    array(
      'as'=>'user-get',
      'uses'=> 'CrisController@getUsers'
    ));

//route to post a new user
Route::any('cris-rest-api/post/user', array(
    'as' => 'user-post',
    'uses' => 'CrisController@postUser'
));

//route to update user data
Route::get('cris-rest-api/put/user/{id}', array(
    'as' => 'user-put',
    'uses' => 'CrisController@putUser'
));

//route to delete user
Route::get('cris-rest-api/delete/user/{id}', array(
    'as' => 'user-delete',
    'uses' => 'CrisController@deleteUser'
));
