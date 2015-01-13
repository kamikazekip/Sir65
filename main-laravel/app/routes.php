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


//Guest available user pages
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showHome'));
Route::get('/settings', 'HomeController@showSettings');
Route::get('/posts/{id}', 'PostController@showPost');

Route::post('/changeLanguage', 'HomeController@changeLanguage');
Route::post('/switchNSFW', 'HomeController@switchNSFW');
Route::post('/respect', 'PostController@giveRespect');
Route::post('/dislike', 'PostController@giveDislike');
Route::post('/commentRespect', 'PostController@commentRespect');
Route::post('/profileRespect', 'UserController@profileRespect');

//Accountrelated
Route::get('/signup', 'UserController@showSignup');
Route::get('/login', 'UserController@showLogin');
Route::get('/profiles', 'SearchController@showSearch');
Route::get('/profiles/{name}', 'UserController@showProfile');
Route::get('/profiles/{name}/posts', 'PostController@showProfilePosts');

Route::post('/signup', array('before' => 'csrf', 'uses' => 'UserController@doSignup'));
Route::post('/login', array('before' => 'csrf', 'uses' => 'UserController@doLogin'));

//Searching
Route::post('/searchProfiles', 'SearchController@searchProfiles');
Route::get('/searchTopics', 'SearchController@searchTopics');

//Topics
Route::get('/new',  array('as' => 'new', 'uses' => 'HomeController@showNew'));
Route::get('/popular',  array('as' => 'popular', 'uses' => 'HomeController@showPopular'));
Route::get('/halloffame', array('as' => 'halloffame', 'uses' =>  'HomeController@showHalloffame'));
Route::get('/topics',  array('as' => 'topics', 'uses' => 'TopicController@showTopics'));
Route::get('/t/{topic}', 'TopicController@showTopic');
Route::post('/giveTopicRespect', 'TopicController@topicRespect');

Route::get('/loadMore', 'HomeController@loadMore');

//Logged in available
Route::group(array('before' => 'auth'), function()
{
    Route::get('/logout', 'UserController@doLogout');
    Route::get('/notifications', 'UserController@showNotifications');
    Route::get('/message/{name}', 'UserController@showMessage');
    Route::post('/notifications/delete/{id}', 'UserController@deleteNotification');
    Route::post('/message/{name}', 'UserController@sendMessage');
    Route::get('/upload', 'PostController@showUpload');
    Route::post('/upload', array('before' => 'csrf', 'uses' => 'PostController@doUpload'));
    Route::get('/changeIcon/{name}', 'UserController@showChangeIcon');
    Route::post('/changeIcon', array('before' => 'csrf', 'uses' => 'UserController@doChangeIcon'));
    Route::post('/writeComment/{id}', array('before' => 'csrf', 'uses' => 'PostController@writeComment'));
    Route::post('/setMessageRead', 'HomeController@setMessageRead');
});

//errors
Route::get('/error/404', 'HomeController@show404');

//Paasei
Route::get('/paasei', 'HomeController@showBears');

//About
Route::get('/theIdea', 'HomeController@showTheIdea');


include('composers.php');