<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Auth\AuthRepositoryInterface',
            'App\Repositories\Auth\AuthRepository'
        );
        $this->app->bind(
            'App\Repositories\Akademik\AkademikRepositoryInterface',
            'App\Repositories\Akademik\AkademikRepository'
        );
        $this->app->bind(
            'App\Repositories\Mahasiswa\MahasiswaRepositoryInterface',
            'App\Repositories\Mahasiswa\MahasiswaRepository'
        );
        $this->app->bind(
            'App\Repositories\Panitia\PanitiaRepositoryInterface',
            'App\Repositories\Panitia\PanitiaRepository'
        );

        $this->app->bind(
            'App\Repositories\Dashboard\DashboardRepositoryInterface',
            'App\Repositories\Dashboard\DashboardRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
