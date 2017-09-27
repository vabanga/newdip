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

Route::get('/', ['uses' => 'IndexController@index'])->name('home');
Route::get('/add', ['uses' => 'QuestionController@index'])->name('add');
Route::post('/add', ['uses' => 'QuestionController@addQuest'])->name('add');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', ['uses' => 'AdminController@index'])->name('admin');
Route::post('/admin', ['uses' => 'AdminController@changeAndDelete'])->name('admin');
Route::get('/admin/create', ['uses' => 'CreateAdminController@index'])->name('create');
Route::post('/admin/create', ['uses' => 'CreateAdminController@create'])->name('create');
Route::get('/admin/listTheme', ['uses' => 'ListThemeController@index'])->name('list');
Route::get('/admin/listTheme/more', ['uses' => 'ListThemeController@more'])->name('more');
Route::post('/admin/listTheme/more', ['uses' => 'ListThemeController@moreTheme'])->name('more');

Route::get('/admin/listTheme/more/{theme}', function ($theme) {
    $_GET=$theme;
    return view('page.pageIndexInterface.listThemeMore');
});








//Route::get('/admin/listTheme/more/{theme}', ['uses' => 'ListThemeController@themeMore'])->name('more');
Route::post('/admin/listTheme/create', ['uses' => 'ListThemeCreateController@create'])->name('themeCreate');

