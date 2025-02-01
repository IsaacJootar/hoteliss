<?php

namespace App\Providers;

use App\Services\EmailMessageService;
use Illuminate\Support\ServiceProvider;

class EmailMessageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void // for sending messages-mails,systems messages, text phone messages
    {
        $this->app->singleton(EmailMessageService::class, fn() => new EmailMessageService());

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
