<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Strapi\getController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Helpline-Contacts
Route::get('/helpline-contacts', [getController::class, 'index']);
Route::post('/helpline-contacts/filter', [getController::class, 'filter']);
Route::get('/helpline-contacts/{id}', [getController::class, 'show']);

//resource route for category groups, which automatically maps standard RESTful routes (index, create, store, show, edit, update, destroy) to controller actions.
Route::resource('/category-groups', CategoriesController::class);

// Route to fetch all records
Route::post('/constitution-of-indias', [getController::class, 'constitution']);

// Route to fetch a single record by ID
// Route::get('/constitution-of-indias/{id}', [getController::class, 'show']);
