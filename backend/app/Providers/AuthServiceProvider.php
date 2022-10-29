<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $spaUrl = 'http://spa.test?email_verify_url' . $url;
            return (new MailMessage)->subject('verify Emaill Address')->line('Click button below to verify your email address.')->action('Verift Email Address', $spaUrl);
        });
    }
}
