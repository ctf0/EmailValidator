<h1 align="center">
    EmailValidator
    <br>
    <a href="https://packagist.org/packages/ctf0/email-validator"><img src="https://img.shields.io/packagist/v/ctf0/email-validator.svg" alt="Latest Stable Version" /></a> <a href="https://packagist.org/packages/ctf0/email-validator"><img src="https://img.shields.io/packagist/dt/ctf0/email-validator.svg" alt="Total Downloads" /></a>
</h1>

- MailGunValidatorServiceProvider [Mailgun Api](http://documentation.mailgun.com/api-email-validation). "[No Longer Free](http://blog.mailgun.com/mailgun-rolls-out-changes-to-email-validation-api-including-new-pricing-model-and-features/)"
- EguliasValidatorServiceProvider [Egulias EmailValidator](https://github.com/egulias/EmailValidator).
- ValidatorPizzaServiceProvider [Validator.pizza](https://www.validator.pizza)

> also check https://github.com/mailcheck/mailcheck & for vue https://github.com/ctf0/mailcheck-vue

<br>

## Installation

- `composer require ctf0/email-validator`

- add the service provider to `config/app.php`

    ```php
    'providers' => [
        ctf0\EmailValidator\MailGunValidatorServiceProvider::class,
        // ctf0\EmailValidator\EguliasValidatorServiceProvider::class,
        // ctf0\EmailValidator\ValidatorPizzaServiceProvider::class,
    ]
    ```

<br>

## Usage

- add the rule to the validator

    ```php
    'email' => 'required|email|isValid'
    ```

- add the translation keys

    ```php
    'custom' => [
        // ...
        'email' => [
            'isValid' => 'This :attribute is invalid',
        ],
    ],
    ```

<br>

### Security

If you discover any security-related issues, please email [ctf0-dev@protonmail.com](mailto:ctf0-dev@protonmail.com).
