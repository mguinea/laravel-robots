# Laravel Robots

Laravel package to manage robots in an easy way

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Laravel 5.6.x](https://img.shields.io/badge/Laravel-5.x-orange.svg)](http://laravel.com)

### Installing

You can install via Composer.

```bash
$ composer require mguinea/laravel-robots
```

Or add the following to your composer.json file and run composer update:

```json
{
    "require": {
        "mguinea/laravel-robots": "dev-master"
    }
}
```

## Running the tests

Just execute

```bash
$ composer test
```

Unit tests will test all methods from Robots class and its related facade.

## Usage

### 1. Dynamically

You can use Robots in routes file to generate a dynamic response

```php
<?php

Route::get('robots.txt', function() {
    $robots = new \Robots\Robots;

    // If on the live server
    if (App::environment() == 'production') {
        $robots->addUserAgent('*')->addSitemap('sitemap.xml');
    } else {
        // If you're on any other server, tell everyone to go away.
        $robots->addDisallow('*');
    }

    return Response::make($robots->generate(), 200, array('Content-Type' => 'text/plain'));
});
```

### 1.1. Dynamically with facade

You can use Robots facade in routes file to generate a dynamic response

```php
<?php

Route::get('robots.txt', function() {

    // If on the live server
    if (App::environment() == 'production') {
        Robots::addUserAgent('*');
        Robots::addSitemap('sitemap.xml');
    } else {
        // If you're on any other server, tell everyone to go away.
        Robots::addDisallow('*');
    }

    return Response::make(Robots::generate(), 200, array('Content-Type' => 'text/plain'));
});
```
### Methods

You can use Robots class methods in an individual or nested way.

Remember that you can use Facade to avoid instantiation.

```php
<?php
    // Add an allow rule to the robots. Allow: foo
    $robots->addAllow('foo');

    // Add multiple allows rules to the robots. Allow: foo Allow: bar
    $robots->addAllow(['foo', 'bar']);
```

```php
<?php
    // Add a comment to the robots. # foo
    $robots->addComment('foo');
```

```php
<?php
    // Add a disallow rule to the robots. Disallow: foo
    $robots->addDisallow('foo');

    // Add multiple disallows rules to the robots. Disallow: foo Disallow: bar
    $robots->addDisallow(['foo', 'bar']);
```

```php
<?php
    // Add a Host to the robots. Host: foo
    $robots->addHost('foo');
```

```php
<?php
    // Add a Sitemap to the robots. Sitemap: foo
    $robots->addSitemap('foo');
```

```php
<?php
    // Add a spacer to the robots.
    $robots->addSpacer();
```

```php
<?php
    // Add a User-agent to the robots. User-agent: foo
    $robots->addUserAgent('foo');
```

```php
<?php
    // Generate the robots data.
    $robots->generate();
```

```php
<?php
    // Reset the rows.
    $robots->reset();
```

## Built With

* [Laravel](https://laravel.com/) - The web framework
* [Composer](https://getcomposer.org/) - Dependency manager
* [Atom](https://atom.io/) - Text editor

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/mguinea/laravel-robots/tags).

## Authors

* **Marc Guinea** - *Initial work* - [MarcGuinea](http://www.marcguinea.com)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
