<?php
Route::group(['middleware' => ['web']], function () {

    //Route::auth();
    Route::get('home', 'HomeController@index');

    Route::get('admin/login', 'Admin\AuthController@getLogin');
    Route::post('admin/login', 'Admin\AuthController@postLogin');
    Route::get('admin/register', 'Admin\AuthController@getRegister');
    Route::post('admin/register', 'Admin\AuthController@postRegister');
    Route::get('admin', 'AdminController@index');
    Route::get('/', function () {
	    return view('welcome');
	});
    Route::get('login', 'Auth\CustomauthController@getLogin');
    Route::post('login', 'Auth\CustomauthController@nameLogin');
    Route::get('register', 'Auth\CustomauthController@getRegister');
    Route::post('register', 'Auth\CustomauthController@postRegister');
    Route::get('logout', function(){
        Auth::logout();
    });


});
Route::group(['middleware' => ['web','auth:web'],"prefix"=>"note","namespace"=>"Note"], function () {
    //Route::get('/', 'ArticleController@index');
    Route::get('sellabel', 'LabelController@get_labels');
    Route::get('addlabel', 'LabelController@addLabel');
    Route::get('dellabel', 'LabelController@delLabel');
    Route::get('editlabel', 'LabelController@editLabel');

    Route::get('selcontentsbylabel', 'ContentController@getContentByLabel');
    Route::post('addcontent', 'ContentController@addContent');
    Route::get('delcontent', 'ContentController@delContent');
    Route::get('selcontent', 'ContentController@getContent');

    Route::get('/', 'IndexController@index');
});
Route::get("/qlyytest",["uses"=>"QlyytestController@index"]);
Route::match(['get','post'],"/editor",["uses"=>"UeditorController@index"]);

