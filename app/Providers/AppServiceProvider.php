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
        $this->app->bind(
            'App\Repositories\Verifikasi\VerifikasiRepositoryInterface',
            'App\Repositories\Verifikasi\VerifikasiRepository'
        );
        $this->app->bind(
            'App\Repositories\File\FileRepositoryInterface',
            'App\Repositories\File\FileRepository'
        );
        $this->app->bind(
            'App\Repositories\TahapSidang\TahapSidangRepositoryInterface',
            'App\Repositories\TahapSidang\TahapSidangRepository'
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
