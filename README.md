# EmailValidator

[![Latest Stable Version](https://img.shields.io/packagist/v/ctf0/email-validator.svg?style=for-the-badge)](https://packagist.org/packages/ctf0/email-validator) [![Total Downloads](https://img.shields.io/packagist/dt/ctf0/email-validator.svg?style=for-the-badge)](https://packagist.org/packages/ctf0/email-validator)

- MailGunValidatorServiceProvider [Mailgun Api](http://documentation.mailgun.com/api-email-validation).
- EguliasValidatorServiceProvider [Egulias EmailValidator](https://github.com/egulias/EmailValidator).
- ValidatorPizzaServiceProvider [Validator.pizza](https://www.validator.pizza)

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
