<?php

namespace App\Providers;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\SpoofCheckValidation;
use Illuminate\Support\ServiceProvider;
use Validator;

class EguliasValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('isValid', function ($attribute, $value, $parameters, $validator) {
            $validator = new EmailValidator();
            $multipleValidations = new MultipleValidationWithAnd([
                new RFCValidation(),
                new DNSCheckValidation(),
                new SpoofCheckValidation(),
            ]);

            return $validator->isValid($value, $multipleValidations);
        }, 'This email is invalid');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(\App\Providers\EguliasValidatorServiceProvider::class);
    }
}
