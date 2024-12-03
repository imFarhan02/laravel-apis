<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Strapi\getController;

//resource route for category groups, which automatically maps standard RESTful routes (index, create, store, show, edit, update, destroy) to controller actions.
Route::resource('/api/category-groups', CategoriesController::class);


Route::get('/', function () {
    return view('welcome');
});

// Route to fetch all records
Route::post('/api/constitution-of-indias', [getController::class, 'constitution']);

// Route to fetch a single record by ID
// Route::get('/constitution-of-indias/{id}', [getController::class, 'show']);

