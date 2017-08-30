<?php

namespace ctf0\EmailValidator;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorPizzaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('isValid', function ($attribute, $value, $parameters, $validator) {
            $req = (new Client())->get('https://www.validator.pizza/email/' . $value);
            $body = json_decode($req->getBody()->getContents());

            switch ($body) {
                case 400 == $body->status:
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
}
