<?php

namespace ctf0\EmailValidator;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class MailGunValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('isValid', function ($attribute, $value, $parameters, $validator) {
            $req = (new Client())->get('https://api.mailgun.net/v3/address/validate', [
                'query' => [
                    'address' => $value,
                    'api_key' => env('MAILGUN_API_KEY', 'pubkey-83a6-sl6j2m3daneyobi87b3-ksx3q29'),
                ],
                'auth'   => null,
            ]);

            return json_decode($req->getBody()->getContents())->is_valid;
        }, 'This email is invalid');
    }
}
