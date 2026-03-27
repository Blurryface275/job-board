<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    //
    public function index()
    {
        // membuat data diambil hanya menggunakan 1 query saja, dengan menggunakan eager loading untuk mengambil data perusahaan yang terkait dengan relasi one to many
        $jobs = Job::with('employer')->latest()->simplePaginate(3); // mengambil semua data pekerjaan beserta data perusahaan yang terkait dengan relasi one to many

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store(Request $request) {
         request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'description' => ['required'],
    ]);

    Job::create([
        'employer_id' => 1, // ini hanya contoh, nanti akan diganti dengan data yang dipilih dari dropdown perusahaan
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description')
    ]);

    return redirect('/jobs');
    }

    public function edit(Request $request, Job $job) {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Request $request, Job $job) {
        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['required'],
        ]);
        // authorize (On hold...) --- IGNORE ---
        // update the job with the new data
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description')
        ]);

        return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job) {
        $job->delete(); // mencari data pekerjaan berdasarkan id yang diberikan, jika tidak ditemukan maka akan menampilkan error 404

        return redirect('/jobs');
    }
}
