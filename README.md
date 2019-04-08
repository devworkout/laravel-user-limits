# Laravel User Limits

This package abstracts and simplifies managing monthly service limits for users in your Laravel application.

## Installation

You can install the package via composer:

```bash
composer require devworkout/laravel-user-limits
```

Add \DevWorkout\UserLimits\Models\HasLimits trait to User model:

```php
    use HasLimits;
```

Add `limits:refresh` to your Console Kernel Schedule.


## Usage

``` php

\DevWorkout\UserLimits\Limit::create([
    'subject' => 'domains',
    'allowed' => 3,
    'period' => 'permanent'
]);

\DevWorkout\UserLimits\Limit::create([
    'subject' => 'cards',
    'package' => 'pro',
    'allowed' => 100,
    'period' => 'monthly'
]);

echo auth()->user()->usage('cards')->allowed();
echo auth()->user()->usage('cards')->used();
echo auth()->user()->usage('cards')->remaining();

echo auth()->user()->usage('cards','pro')->exceeded();

echo auth()->user()->usage('cards')->reset();
echo auth()->user()->usage('cards')->increment();
echo auth()->user()->usage('domains')->decrement();

echo auth()->user()->usage('cards')->refreshed_at();
echo auth()->user()->usage('cards')->next_refresh_at();

```

### Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- [devworkout](https://github.com/devworkout)
- [All Contributors](../../contributors)

## Support us

Give us a star!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
