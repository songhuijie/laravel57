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


Route::get('/index','IndexController@index')->name('index');
Route::get('/test2','IndexController@test2')->name('test2');
Route::get('/tests','IndexController@tests')->name('tests');
Route::any('/testss','IndexController@testss')->name('testss');
Route::any('/testsss','IndexController@testsss')->name('testsss');
Route::any('/shop','IndexController@shop')->name('shop');
Route::any('/tt','IndexController@tt')->name('tt');
Route::get('/ins','IndexController@ins_login')->name('ins_login');
Route::get('/blog','IndexController@blog')->name('blog');
Route::get('/personal','IndexController@personal')->name('personal');
Route::any('/postlogin','IndexController@postLogin');

Route::any('/sign','IndexController@sign')->name('sign');

Route::any('/signup','IndexController@signUp')->name('signup');//注册
Route::any('/verifysignup','IndexController@verifySignUp')->name('verifySignUp');//验证注册

Route::post('/portrait','IndexController@portrait');//上传图像

Route::get('/redis','IndexController@redis');
Route::get('/sendphone','IndexController@sendPhone');
Route::get('/rotation','TestController@rotation');
Route::get('/guzzle','TestController@guzzle');




Route::get('/cate','CateController@index');



//Gate::define('/index', function (?User $user, Post $post) {
    // ...
//    return isset($user->id);

//});



Route::get('/cate','HomeController@cate');
Route::get('/article','HomeController@article');


