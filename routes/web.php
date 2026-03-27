<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;




Route::view('/', 'home');

Route::controller(JobController::class)->group(function () {

    // Index
    Route::get('/jobs', [JobController::class, 'index']);

    //Create
    Route::get('/jobs/create', [JobController::class, 'create']);

    // Show
    Route::get('/jobs/{job}', [JobController::class, 'show']);

    // Store
    Route::post('/jobs', [JobController::class, 'store']);

    // Edit
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

    // Update
    Route::patch('/jobs/{job}', [JobController::class, 'update']);

    // Destroy
    Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
});

// digunakan untuk membuat semua route resource sekaligus, dengan mengecualikan beberapa route yang sudah didefinisikan secara manual di atas. 
// Dengan menggunakan Route::resource, kita dapat menghemat waktu dan usaha dalam mendefinisikan route untuk setiap aksi CRUD (Create, Read, Update, Delete) pada resource Job. 
// Namun, karena kita sudah mendefinisikan route untuk index, create, show, store, edit, update, dan destroy secara manual, kita perlu mengecualikan route tersebut dari Route::resource agar tidak terjadi konflik atau duplikasi dalam penanganan request.
Route::resource('jobs', JobController::class, [
    'except' => ['index', 'create', 'show', 'store', 'edit', 'update', 'destroy']
]);
Route::view('/contact', 'contact');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

// Logout
Route::post('/logout', [SessionController::class, 'destroy']);
