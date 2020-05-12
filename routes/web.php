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
        ->middleware('permssion:roles.create');

    //visualizar el sitado
    Route::get('roles','RoleController@index')->name('roles.index')
        ->middleware('permssion:roles.index');
    // ver el formulario de creacion
    Route::get('roles/create','RoleController@create')->name('roles.create')
        ->middleware('permssion:roles.create');
    // actualizar
    Route::put('roles/{role}','RoleController@update')->name('roles.update')
        ->middleware('permssion:roles.edit');
    //ver el detalle
    Route::get('roles/{role}','RoleController@show')->name('roles.show')
        ->middleware('permssion:roles.show');
    // eliminar
    Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
        ->middleware('permssion:roles.destroy');
    // ver el formulario de edicion
    Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
        ->middleware('permssion:roles.edit');

    //PRODUCTOS

    // crear
    Route::post('products/store','ProductController@store')->name('products.store')
        ->middleware('permssion:products.create');

    //visualizar el sitado
    Route::get('products','ProductController@index')->name('products.index')
        ->middleware('permssion:products.index');
    // ver el formulario de creacion
    Route::get('products/create','ProductController@create')->name('products.create')
        ->middleware('permssion:products.create');
    // actualizar
    Route::put('products/{role}','ProductController@update')->name('products.update')
        ->middleware('permssion:products.edit');
    //ver el detalle
    Route::get('products/{role}','ProductController@show')->name('products.show')
        ->middleware('permssion:products.show');
    // eliminar
    Route::delete('products/{role}','ProductController@destroy')->name('products.destroy')
        ->middleware('permssion:products.destroy');
    // ver el formulario de edicion
    Route::get('products/{role}/edit','ProductController@edit')->name('products.edit')
        ->middleware('permssion:products.edit');


    //USUARIOS

 
    //visualizar el sitado
    Route::get('users','UserController@index')->name('users.index')
        ->middleware('permssion:users.index');

    // actualizar
    Route::put('users/{role}','UserController@update')->name('users.update')
        ->middleware('permssion:users.edit');
    //ver el detalle
    Route::get('users/{role}','UserController@show')->name('users.show')
        ->middleware('permssion:users.show');
    // eliminar
    Route::delete('users/{role}','UserController@destroy')->name('users.destroy')
        ->middleware('permssion:users.destroy');
    // ver el formulario de edicion
    Route::get('users/{role}/edit','UserController@edit')->name('users.edit')
        ->middleware('permssion:users.edit');
});
