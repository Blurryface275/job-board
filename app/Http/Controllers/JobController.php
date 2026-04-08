<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

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

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'description' => ['required'],
        ]);

        $employer = Auth::user()->employer;

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
            'employer_id' => $employer->id,
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job) // mengirim email tapi sebagai queue, sehingga email akan dikirim secara asynchronous jadi ga nunggu lama
        );

        return redirect('/jobs');
    }

    public function edit(Request $request, Job $job)
    {
        if (Auth::guest()) {
            return redirect('/login')->with('error', 'You must be logged in to edit this job listing.');
        }

        // The gate will run gate logic with the same name and will check if the user is authorized to edit
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Request $request, Job $job)
    {
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

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        if (Auth::guest()) {
            return redirect('/login')->with('error', 'You must be logged in to edit this job listing.');
        }


        $job->delete(); // mencari data pekerjaan berdasarkan id yang diberikan, jika tidak ditemukan maka akan menampilkan error 404

        return redirect('/jobs');
    }
}
