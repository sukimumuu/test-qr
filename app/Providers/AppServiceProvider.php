<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('Verifikasi Alamat Email')
            ->view('auth.email-sent', ['url' => $url]);
            // ->line('Klik Tombol Dibawah Ini Untuk Verifikasi')
            // ->action('Verifikasi Email', $url);
    });

    }
}
