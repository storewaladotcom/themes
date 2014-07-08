## Laravel 4 - Simple Themes

### Installation

Open your composer.json file, and add the new required package.
```
"pingpong/themes": "dev-master"
```
Next, open a terminal and run.
```
composer update
```

Next, Add new service provider in `app/config/app.php`.

```php

  'Pingpong\Themes\ThemesServiceProvider',

```

Next, Add new aliases in `app/config/app.php`.

```php
'Theme'      => 'Pingpong\Themes\Facades\Theme',
```

Next, publish the asset. The asset is an example theme.
```
php artisan asset:publish pingpong/themes
```

Done.

### Usage

Get all themes.
```php
Theme::all();
```

Set theme active.
```php
Theme::set('default');

Theme::setCurrent('default');
```

Check theme.
```
Theme::has('simple')

Theme::exists('other-theme');
```

Get current theme active.
```php
Theme::getCurrent();
```

Set theme path.
```php
$path = public_path('themes');

Theme::setPath($path);
```

Get theme path.
```php
Theme::getThemePath('default');
```

Get themes path.
```php
Theme::getPath();
```

Get view for current active theme.
```php
Theme::view('index');

Theme::view('folders.view');
```

Get config for current active theme.
```php
Theme::config('group.name');
```

Get lang for current active theme.
```php
Theme::lang('group.name');
```


### License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).