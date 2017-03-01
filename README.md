# MailGunEmailValidator
validation rule to validate emali using [Mailgun Api](http://documentation.mailgun.com/api-email-validation.html).

- register providor

```php
'providers' => [
    App\Providers\MailGunValidatorServiceProvider::class,
]
```

- add the rule to the validator

```php
'email' => 'required|email|mailgun',
```

# ToDo

* [ ] Turn into Package.
