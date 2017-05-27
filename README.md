# EmailValidator
- ### MailGunValidatorServiceProvider
Email validation using [Mailgun Api](http://documentation.mailgun.com/api-email-validation).

- ### EguliasValidatorServiceProvider
Email validation using [Egulias EmailValidator](https://github.com/egulias/EmailValidator).

- ### ValidatorPizzaServiceProvider
Email validation using [Validator.pizza](https://www.validator.pizza)

1 - register providor

```php
'providers' => [
    App\Providers\MailGunValidatorServiceProvider::class,
    // App\Providers\EguliasValidatorServiceProvider::class,
    // App\Providers\ValidatorPizzaServiceProvider::class,
]
```

2 - add the rule to the validator

```php
'email' => 'required|email|isValid',
```

3 - add the translation keys

```php
'custom' => [
    // ...
    'email' => [
        'isValid' => 'This :attribute is invalid',
    ],
],
```

# ToDo

* [ ] Turn into Package.
