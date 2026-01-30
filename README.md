# Password App

## Description

Module de gestion de connexion utilisant [Laravel Socialite](https://laravel.com/docs/socialite).

# Installation

Ajoutez les lignes suivantes dans votre `composer.json` :

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/curini/password"
        }
    ],
    "require": {
        "php": "^8.2",
        "curini/password": "dev-main"
    }
}
```

Puis exécutez :

```bash
composer install
```

## Configuration

Ajoutez dans le fichier `config/services.php`:

```php
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CLIENT_CALLBACK')
    ],
```

Configurez vos clés API dans le fichier `.env` :

```env
GITHUB_CLIENT_ID=your_client_id
GITHUB_CLIENT_SECRET=your_client_secret
```

## Personnalisation

Il est possible de personnaliser les liens, les classes css, etc... via le fichier `config/socialite.php`:

```php
<?php

return [
    'redirect' => [
        'success' => env('SOCIALITE_REDIRECT_SUCCESS', '/'),
        'error' => env('SOCIALITE_REDIRECT_ERROR', '/login'),
    ],
    'css' => [
        'button' => env('SOCIALITE_CSS_BUTTON', 'gap-2 rounded-full p-2 text-sm leading-5 text-white bg-zinc-500 hover:bg-zinc-700'),
        'img' => env('SOCIALITE_CSS_IMG', 'inline-block'),
    ],
    'text' => env('SOCIALITE_GITHUB_TEXT', 'Sign in with GitHub'),
    'img' => env('SOCIALITE_GITHUB_IMG', 'https://d1mj7kpaxms69g.cloudfront.net/assets/github_logo_light-5473d144f61893d30a58ba3f4fee4ece8d4b6425bb1f00d7f856b3d65d04ab9d.svg')
];
```

## Utilisation

Vous devez importer dans le blade de votre page de login, la partie suivante:

```php
    @include('socialite::login')
```

## Providers Disponibles

- [x] GitHub
- [ ] Google
- [ ] Facebook
