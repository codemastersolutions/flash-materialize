# Easy Flash Messages for Your Laravel App with Materialize-CSS

This project is a fork of the original ![laracasts/flash](https://github.com/laracasts/flash) project.

This composer package offers a Google Materialize-CSS optimized flash messaging setup for your Laravel applications.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require codemastersolucoes/flash-materialize
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    CodeMasterSolucoes\FlashMaterialize\FlashServiceProvider::class,
];
```
After publishes, a configuration file is created in the config folder.

## Config colors of flash messages
```php
'colors' => [
        'info'    => [
            'message'   => [
                'background' => 'blue darken-2 font-weight-bold',
                'text'       =>  'white-text'
            ],
            'button' => [
                'background' => 'blue darken-2',
                'text'       => 'yellow-text'
            ],
        ],
        'success' => [
            'message' => [
                'background' => 'green',
                'text'       => 'white-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'green',
                'text'       => 'white-text'
            ],
        ],
        'warning' => [
            'message' => [
                'background' => 'yellow darken-3',
                'text'       => 'black-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'yellow darken-3',
                'text'       => 'red-text'
            ],
        ],
        'error'   => [
            'message' => [
                'background' => 'red',
                'text'       => 'white-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'red',
                'text'       => 'white-text'
            ],
        ],
    ],
```

## Config path of view
```php
'views_path' => base_path('resources/views/vendor/flash-materialize'),
```

Finally, as noted above, the default CSS classes for your flash message are optimized for Google Materialize-CSS. As such, pull in the Materialize-CSS, Materialize-JS and jQuery plugin within your HTML or layout file.

IMPORTANT!!! jQuery plugin should come before the Materialize-JS plugin!

```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
```

## Usage

Within your controllers, before you perform a redirect, make a call to the `flash()` function.

```php
public function store()
{
    flash('Welcome Aboard!');

    return home();
}

public function info()
{
    flash()->info('Message Info');

    return home();
}

public function success()
{
    flash()->success('Message Success');

    return home();
}

public function warning()
{
    flash()->warning('Message Warning');

    return home();
}

public function error()
{
    flash()->error('Message Error');

    return home();
}
```

You may also do:

- `flash('Message', 30000);` or `flash()->info('Message Info', 30000);`: Set the flash time to disappear from the screen.

With this message flashed to the session, you may now display it in your view(s). Because flash messages are so common, we provide a template out of the box to get you started. You're free to use - and even modify to your needs - this template how you see fit.

```html
@include('flash::message')
```

After inserting the jQuery and Materialize-CSS scripts, enter the code below.

```html
@stack('flash-materialize')
```

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>
<body>

<div class="container">
    @include('flash::message')

    <p>Welcome to my website...</p>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@stack('flash-materialize')
</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish --provider="CodeMasterSolucoes\FlashMaterialize\FlashServiceProvider"
```

The two package views will now be located in the `resources/views/vendor/flash-materialize/` directory.

Default:
```php
flash('Welcome Aboard!');

return home();
```

Assigning time (in milliseconds) for the message to disappear from the screen
```php
flash('Disappear in 30 seconds', 30000);

return home();
```

## Multiple Flash Messages

Need to flash multiple flash messages to the session? No problem.

```php
flash('Message 1');
flash('Message 2', 30000);

return redirect('somewhere');
```

Done! You'll now see two flash messages upon redirect.