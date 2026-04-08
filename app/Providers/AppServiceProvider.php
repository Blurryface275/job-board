<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
        Model::preventLazyLoading(); // mencegah lazy loading di lingkungan non-produksi, sehingga jika ada relasi yang tidak dimuat secara eksplisit, akan menghasilkan error, ini membantu untuk mengidentifikasi masalah N+1 query

        // Paginator::useBootstrapFive(); // menggunakan styling bootstrap untuk pagination, sehingga tampilan pagination akan sesuai dengan desain bootstrap
        Gate::define('edit-job', function (User $user, Job $job) {
            if ($job->employer->user->isNot(Auth::user())) {
                abort(403);
            }
        });
    }
}
