<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Подтверждение адреса')
                ->greeting('Добрый день!')
                ->line('Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить свой адрес электронной почты')
                ->action('Подтвердить', $url)
                ->line('Если вы не создавали учетную запись, никаких дальнейших действий не требуется.');
        });
    }
}
