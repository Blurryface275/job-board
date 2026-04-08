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



// digunakan untuk membuat semua route resource sekaligus, dengan mengecualikan beberapa route yang sudah didefinisikan secara manual di atas.
// Dengan menggunakan Route::resource, kita dapat menghemat waktu dan usaha dalam mendefinisikan route untuk setiap aksi CRUD (Create, Read, Update, Delete) pada resource Job.
// Namun, karena kita sudah mendefinisikan route untuk index, create, show, store, edit, update, dan destroy secara manual, kita perlu mengecualikan route tersebut dari Route::resource agar tidak terjadi konflik atau duplikasi dalam penanganan request.
Route::resource('jobs', JobController::class)->middleware([
    'store' => 'auth',
    'create' => 'auth',
    'edit' => 'auth',
    'update' => 'auth',
    'destroy' => 'auth',
]); // hanya route store, create, edit, update, dan destroy yang membutuhkan middleware auth, sehingga hanya pengguna yang sudah login yang dapat mengakses route tersebut. Sedangkan route index dan show tetap dapat diakses oleh semua pengguna tanpa harus login terlebih dahulu.
Route::view('/contact', 'contact');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

// Logout
Route::post('/logout', [SessionController::class, 'destroy']);
