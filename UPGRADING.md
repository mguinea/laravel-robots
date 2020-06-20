# Upgrading

Because there are many breaking changes. We accept PRs to improve this guide.

## From v1 or v2 to v3

- Change `^v2` to `^3.0` in your `composer.json` and run `composer update`
- Rename `config/robots.php` to `config/laravel-robots.php`
- Rename namespace `Robots\*` to `Mguinea\Robots\*`
