<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;




Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // membuat data diambil hanya menggunakan 1 query saja, dengan menggunakan eager loading untuk mengambil data perusahaan yang terkait dengan relasi one to many
    $jobs = Job::with('employer')->simplePaginate(3); // mengambil semua data pekerjaan beserta data perusahaan yang terkait dengan relasi one to many

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
