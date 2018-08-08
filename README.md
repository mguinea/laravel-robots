# Laravel Robots

Laravel package to manage robots in an easy way

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Laravel 5.6.x](https://img.shields.io/badge/Laravel-5.x-orange.svg)](http://laravel.com)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Give examples
```

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

## Usage

Add additional notes about how to deploy this on a live system

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

## Built With

* [Laravel](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Composer](https://maven.apache.org/) - Dependency Management
* [Atom](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/mguinea/laravel-robots/tags).

## Authors

* **Marc Guinea** - *Initial work* - [MarcGuinea](http://www.marcguinea.com)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
