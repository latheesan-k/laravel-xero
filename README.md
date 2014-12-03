# Xero Service Provider for Laravel 4

Originally forked from https://github.com/VentureCraft/xero-laravel and updated to support newer API features (e.g. `ContactGroups` and paging results etc...).

A simple [Laravel 4](http://laravel.com) service provider for including the [PHP Xero API](https://github.com/XeroAPI/PHP-Xero).

## Installation

The Xero Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the `latheesan-k/laravel-xero` package and setting the `minimum-stability` to `dev` in your project's `composer.json`.

```json
{
	"require": {
		"laravel/framework": "4.0.*",
		"latheesan-k/laravel-xero": "dev-master"
	},
	"minimum-stability": "dev"
}
```

## Usage

To use the Xero Service Provider, you must register the provider when bootstrapping your Laravel application.

### Use Laravel Configuration

Create a new `app/config/xero.php` configuration file with the following options:

```php
return array(
    'key'           => '<your-xero-key>',
    'secret'        => '<your-xero-secret>',
    'publicPath'    => app_path() .'/config/xero/publickey.cer',
    'privatePath'   => app_path() .'/config/xero/privatekey.pem'
);
```

Find the `providers` key in `app/config/app.php` and register the Xero Service Provider.

```php
    'providers' => array(
        // ...
        'Latheesan\LaravelXero\LaravelXeroServiceProvider',
    )
```

Find the `aliases` key in `app/config/app.php` and add in our `LaravelXero` alias.

```php
    'aliases' => array(
        // ...
        'LaravelXero' 	  => 'Latheesan\LaravelXero\Facades\LaravelXero',
    )
```

### Setting up the application

Create public and private keys, and save them in /app/config/xero/ as publickey.cer and privatekey.pem.

For more info on setting up your keys, check out the [Xero documentation](http://developer.xero.com/documentation/advanced-docs/public-private-keypair/)

## Example Usage

**Create a Contact in Xero**

```
$contact = array(
    array(
       	"Name"        => 'Company Name Ltd',
       	"FirstName"   => 'John',
		"LastName"    => 'Doe',
	)
);

$xero_contact = LaravelXero::Contacts($contact);
```

**GET Contacts with WHERE clause & Paging**

```
$where = "ContactNumber!=null&IsCustomer=true";
$page  = 1;

print_r(LaravelXero::Contacts(false, false, $where, false, $page));
```

## Reference

* [PHP Xero API](https://github.com/XeroAPI/PHP-Xero)
* [Laravel website](http://laravel.com)
