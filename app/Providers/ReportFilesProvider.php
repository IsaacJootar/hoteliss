<?php

namespace App\Providers;

use App\Services\ReportFilesService;
use Illuminate\Support\ServiceProvider;

class ReportFilesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void // for uploading report files creating record of samein the database
    {
        $this->app->singleton(ReportFilesService::class, fn() => new ReportFilesService());

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
