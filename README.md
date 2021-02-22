# Laravel Robots

Laravel package to manage robots in an easy way.

If you need a detailed explanation about how robots.txt file works, visit http://www.robotstxt.org/robotstxt.html

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mguinea/laravel-robots/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mguinea/laravel-robots/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mguinea/laravel-robots/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mguinea/laravel-robots/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/mguinea/laravel-robots/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mguinea/laravel-robots/build-status/master)
[![StyleCI](https://styleci.io/repos/143919791/shield?branch=master)](https://styleci.io/repos/143919791)
[![License MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-6.x-orange.svg)](http://laravel.com)
[![Laravel](https://img.shields.io/badge/Laravel-7.x-orange.svg)](http://laravel.com)

This package allows you to manage robots of your site dinamically allowing you to differenciate between environments or configurations.

Migration to persist configuration is optional; you can change its data source.

Once package is installed you can do these things:

```php
Route::get('robots.txt', function() {
    $robots = new \Mguinea\Robots\Robots;

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

### Installing

You can install via Composer.

```bash
composer require mguinea/laravel-robots
```

## Running the tests

Just execute

```bash
vendor/bin/phpunit
```

Unit tests will test all methods from Robots class and its related facade.

## Usage

### 1. Dynamically

You can use Robots in routes file to generate a dynamic response

```php
Route::get('robots.txt', function() {
    $robots = new \Mguinea\Robots\Robots;

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

use Mguinea\Robots\Facades\Robots;

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
use Mguinea\Robots\Robots;

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
use Mguinea\Robots\Robots;

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
            ],
            'crawlDelay' => 10
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
    
    // Add multiple hosts to the robots. Host: foo Host: bar
    $robots->addHost(['foo', 'bar']);
```

```php
<?php
    // Add a Sitemap to the robots. Sitemap: foo
    $robots->addSitemap('foo');
    
    // Add multiple sitemaps to the robots. Sitemap: foo Sitemap: bar
    $robots->addSitemap(['foo', 'bar']);
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
    
    // Add multiple User-agents to the robots. User-agent: foo User-agent: bar
    $robots->addUserAgent(['foo', 'bar']);
```

```php
<?php
    // Add a crawl-delay to the robots. crawl-delay: 10
    $robots->addCrawlDelay(10);
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

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests.

## Security

If you discover any security related issues, please email develop.marcguinea@gmail.com instead of using the issue tracker.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/mguinea/laravel-robots/tags).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details

## Authors

* **Marc Guinea** [MarcGuinea](https://www.marcguinea.com)

## Acknowledgments

* [Readme best practices](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2) from [PurpleBooth](https://github.com/PurpleBooth)