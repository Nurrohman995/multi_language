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
// Route::get('welcome/{locale}', function ($locale) {
//     App::setLocale($locale);

//     //
// });
Route::get('/locale/{locale}', function (Request $request, $locale) {
    if (array_key_exists($locale, config('app.locales'))) {
        session(['locale' => $locale]);
    }
    return Redirect::back();
})->name('locale');
