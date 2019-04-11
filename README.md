# Laravel Robots

Laravel package to manage robots in an easy way.

If you need a detailed explanation about how robots.txt file works, visit http://www.robotstxt.org/robotstxt.html

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Laravel 5.8](https://img.shields.io/badge/Laravel-5.8-orange.svg)](http://laravel.com)
[![Packagist](https://img.shields.io/packagist/dt/mguinea/laravel-robots.svg)](https://packagist.org/packages/mguinea/laravel-robots)
[![Quality Score](https://img.shields.io/scrutinizer/g/mguinea/laravel-robots.svg)](https://scrutinizer-ci.com/g/mguinea/laravel-robots)
[![Code Coverage](https://scrutinizer-ci.com/g/mguinea/laravel-robots/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mguinea/laravel-robots/?branch=master)
[![StyleCI](https://styleci.io/repos/143919791/shield?branch=master)](https://styleci.io/repos/143919791)
[![Build Status](https://travis-ci.org/mguinea/laravel-robots.svg?branch=master)](https://travis-ci.org/mguinea/laravel-robots)

### Installing

You can install via Composer.

```bash
$ composer require mguinea/laravel-robots
```

Or add the following to your composer.json file and run composer update:

```json
{
    "require": {
        "mguinea/laravel-robots": "^1.0.0"
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
        $robots->addDisallow("/");
    }

    return response($robots->generate(), 200)->header('Content-Type', 'text/plain');
});
```

### 1.1. Dynamically with facade

You can use Robots facade in routes file to generate a dynamic response

```php
<?php

use Robots\Facades\Robots;

Route::get('robots.txt', function() {

    // If on the live server
    if (App::environment() == 'production') {
        Robots::addUserAgent('*');
        Robots::addSitemap('sitemap.xml');
    } else {
        // If you're on any other server, tell everyone to go away.
        Robots::addDisallow("/");
    }

    return response(Robots::generate(), 200)->header('Content-Type', 'text/plain');
});
```

### 2. To robots.txt default file

If you prefer to write the original robots.txt file, just use the generator as you have seen

```php
<?php

use Illuminate\Http\File;
use Robots\Robots;

class Anywhere
{
    public function createFile()
    {
        $robots = new Robots;
        $robots->addUserAgent('*')->addSitemap('sitemap.xml');

        File::put(public_path('robots.txt'), $robots->generate());
    }
}

```

### 3. Building from Data Source

You could prefer building it from some data source. To get that, you just must instantiate Robots object using an array with key value parameters as shown below.

Note that comments and spacers have been removed.

```php
<?php

use Illuminate\Http\File;
use Robots\Robots;

class Anywhere
{
    public function fromArray()
    {
        $robots = new Robots([
            'allows' => [
                'foo', 'bar'
            ],
            'disallows' => [
                'foo', 'bar'
            ],
            'hosts' => [
                'foo', 'bar'
            ],
            'sitemaps' => [
                'foo', 'bar'
            ],
            'userAgents' => [
                'foo', 'bar'
            ]
        ]);
        
        return response($robots->generate(), 200)->header('Content-Type', 'text/plain');
    }
}

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

* **Marc Guinea** [MarcGuinea](https://www.marcguinea.com)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
