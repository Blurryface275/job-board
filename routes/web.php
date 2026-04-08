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


Route::get('test', function () {
    dispatch(function () {
        logger('Hello from the queue!');
    });
    return 'Done!';
});

Route::view('/', 'home');

Route::controller(JobController::class)->group(function () {

    // Index
    Route::get('/jobs', [JobController::class, 'index']);

    //Create
    Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');

    // Show
    Route::get('/jobs/{job}', [JobController::class, 'show']);

    // Store
    Route::post('/jobs', [JobController::class, 'store']);

    // Edit
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job'); // menambahkan middleware auth untuk memastikan bahwa hanya pengguna yang sudah login yang dapat mengakses halaman edit, dan menambahkan gate untuk memastikan bahwa hanya pengguna yang memiliki akses yang dapat mengedit pekerjaan

    // Update
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit', 'job');

    // Destroy
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit', 'job');
});

// digunakan untuk membuat semua route resource sekaligus, dengan mengecualikan beberapa route yang sudah didefinisikan secara manual di atas. 
// Dengan menggunakan Route::resource, kita dapat menghemat waktu dan usaha dalam mendefinisikan route untuk setiap aksi CRUD (Create, Read, Update, Delete) pada resource Job. 
// Namun, karena kita sudah mendefinisikan route untuk index, create, show, store, edit, update, dan destroy secara manual, kita perlu mengecualikan route tersebut dari Route::resource agar tidak terjadi konflik atau duplikasi dalam penanganan request.
Route::resource('jobs', JobController::class);
Route::view('/contact', 'contact');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

// Logout
Route::post('/logout', [SessionController::class, 'destroy']);
