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

Route::get('/home', 'HomeController@index')->name('home');

// ROUTES
Route::middleware(['auth'])->group(function(){
    //Roles

    // crear
    Route::post('roles/store','RoleController@store')->name('roles.store')
        ->middleware('can:roles.create');

    //visualizar el sitado
    Route::get('roles','RoleController@index')->name('roles.index')
        ->middleware('can:roles.index');
    // ver el formulario de creacion
    Route::get('roles/create','RoleController@create')->name('roles.create')
        ->middleware('can:roles.create');
    // actualizar
    Route::put('roles/{role}','RoleController@update')->name('roles.update')
        ->middleware('can:roles.edit');
    //ver el detalle
    Route::get('roles/{role}','RoleController@show')->name('roles.show')
        ->middleware('can:roles.show');
    // eliminar
    Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
        ->middleware('can:roles.destroy');
    // ver el formulario de edicion
    Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
        ->middleware('can:roles.edit');

    //PRODUCTOS

    // crear
    Route::post('products/store','ProductController@store')->name('products.store')
        ->middleware('can:products.create');

    //visualizar el sitado
    Route::get('products','ProductController@index')->name('products.index')
        ->middleware('can:products.index');
    // ver el formulario de creacion
    Route::get('products/create','ProductController@create')->name('products.create')
        ->middleware('can:products.create');
    // actualizar
    Route::put('products/{product}','ProductController@update')->name('products.update')
        ->middleware('can:products.edit');
    //ver el detalle
    Route::get('products/{product}','ProductController@show')->name('products.show')
        ->middleware('can:products.show');
    // eliminar
    Route::delete('products/{product}','ProductController@destroy')->name('products.destroy')
        ->middleware('can:products.destroy');
    // ver el formulario de edicion
    Route::get('products/{product}/edit','ProductController@edit')->name('products.edit')
        ->middleware('can:products.edit');


    //USUARIOS

 
    //visualizar el sitado
    Route::get('users','UserController@index')->name('users.index')
        ->middleware('can:users.index');

    // actualizar
    Route::put('users/{user}','UserController@update')->name('users.update')
        ->middleware('can:users.edit');
    //ver el detalle
    Route::get('users/{user}','UserController@show')->name('users.show')
        ->middleware('can:users.show');
    // eliminar
    Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
        ->middleware('can:users.destroy');
    // ver el formulario de edicion
    Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
        ->middleware('can:users.edit');
});
