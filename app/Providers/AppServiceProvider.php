<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('no_spaces', function ($attribute, $value, $parameters, $validator) {
            return !preg_match('/\s/', $value); // Vérifie si le mot de passe contient des espaces
        });
        //
    }
}
