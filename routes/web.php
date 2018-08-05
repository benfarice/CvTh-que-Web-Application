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
/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('accueil', function () {
    return view('accueil');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('service', function () {
    return view('service');
});
*/
/*
Route::get('contact', function () {
   echo "Je m'appele Youssef Imzoughene";
});
*/

/*
Route::get('contact','TestController@contact');
*/
/*
Route::get('cvs','CvController@index');
Route::get('cvs/create','CvController@create');
Route::post('cvs','CvController@store');
Route::get('cvs/{id}/edit','CvController@edit');
Route::put('cvs/{id}','CvController@update');
Route::delete('cvs/{id}','CvController@destroy');

*/

/*
Route::get('contact/{name}','TestController@contact');

Route::get('newcontact','ContactController@newContact');

Route::get('listcontact','ContactController@listContacts');
*/


/*
Route::get('profil/{name}/id/{id}', function ($name,$id) {
   echo "Je m'appele $name my id is $id";
})->where(['name'=>'[a-zA-Z]+','id'=>'[0-9]+']);
*/
/*
Auth::routes();
*/
/*
Route::get('/home', 'HomeController@index')->name('home');
*/
Route::resource('cvs','CvController');