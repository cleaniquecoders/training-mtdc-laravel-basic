## Update Composer To Latest Version

```bash
composer self-update
```

### Install Laravel Installer

```bash
composer global require laravel/installer
```

### Create a new project

```bash
laravel new training --git --jet --stack=livewire --teams --pest
```

### Run a Project

```bash
php artisan serve
```

Create a controller:

```php
php artisan make:controller WelcomeController --invokable
```

## User Management

Create a resource controller

```
php artisan make:controller UserController --resource --model=User
```

## Eloquent

```
User::all();
User::get();
User::first();
User::paginate();
```

in `DatabaseSeeder`

```php
\App\Models\User::factory(1000)
    ->withPersonalTeam()
    ->create();
```

Wise to run Vite during making changes to view. But make sure to install all dependency packages:

```bash
npm install
```

Then run Vite during development:

```bash
npm run dev
```

### Change Route to use uuid instead of id

Create a column called uuid:

```php
$table->uuid('uuid');
```

Change Route Key to use uuid field instead of id.

```php
/**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'uuid';
}
```

`uuid` field can be create automatically using `creating` event in boot up of the model. Reference [here](https://github.com/nasrulhazim/project-template/blob/master/app/Concerns/InteractsWithUuid.php)

### Install DebugBar for Debugging Purpose

```bash
composer require barryvdh/laravel-debugbar --dev
```

### Security: Authorization

```bash
php artisan make:policy UserPolicy --model=User
```

### Package: Permission

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

Add `HasRoles` trait to `\App\Models\User` class:

```php

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

