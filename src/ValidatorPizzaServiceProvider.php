<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Validator;

class ValidatorPizzaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('isValid', function ($attribute, $value, $parameters, $validator) {
            $req = (new Client())->get('https://www.validator.pizza/email/'.$value);
            $body = json_decode($req->getBody()->getContents());

            switch ($body) {
                case $body->status == 400:
                    return false;
                case !$body->mx:
                    return false;
                case $body->disposable:
                    return false;
                default:
                    return true;
            }
        }, 'This email is invalid');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(\App\Providers\ValidatorPizzaServiceProvider::class);
    }
}
