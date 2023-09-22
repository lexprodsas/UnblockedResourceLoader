# UnblockedResourceLoader

## English

### Overview

**UnblockedResourceLoader** is a PHP-based tool designed to enhance the user browsing experience. It allows for the seamless loading of images and external links, addressing the limitations imposed by ad blockers. This ensures that users receive a complete, non-intrusive browsing experience.

### Installation

#### Manual Installation

1. Clone the repository.
2. Include `UnblockedResourceLoader.php` in your project.

#### Via Composer

1. Run `composer require lexprodsas/unblocked-resource-loader` to add this package to your project's dependencies.
2. Include the Composer autoload file in your project: `require 'vendor/autoload.php';`

### URL Routing

To have all URLs starting with `/link` call this module, you can use one of the following methods:


#### For Apache Servers

Add the following lines to your `.htaccess` file:

```apache
RewriteEngine On
RewriteRule ^link/(.*)$ /path/to/UnblockedResourceLoader.php?url=$1 [L,QSA]
```


#### For Nginx Servers

Add the following rule to your Nginx configuration file (nginx.conf or an included file):

```nginx
location ~ ^/link/(.*)$ {
    rewrite ^/link/(.*)$ /path/to/UnblockedResourceLoader.php?url=$1 last;
}
```


#### For PHP Routers

If you're using a PHP routing system, add a routing rule to redirect URLs starting with `/link` to this module.
```php
$request = $_SERVER['REQUEST_URI'];

if (preg_match('#^/link/#', $request)) {
    require '/path/to/UnblockedResourceLoader.php';
    exit;
}
```

### Usage

For manual use :

```php
require_once 'UnblockedResourceLoader.php';

$loader = new UnblockedResourceLoader();
$loader->execute();
```

For use via Composer :

```php
require 'vendor/autoload.php';

$loader = new UnblockedResourceLoader\UnblockedResourceLoader();
$loader->execute();
```

---

## Français

### Aperçu

**UnblockedResourceLoader** est un outil basé sur PHP conçu pour améliorer l'expérience de navigation de l'utilisateur. Il permet le chargement fluide d'images et de liens externes, en tenant compte des limitations imposées par les bloqueurs de publicités. Cela garantit que les utilisateurs bénéficient d'une expérience de navigation complète et non intrusive.

### Installation

#### Installation manuelle

1. Clonez le dépôt.
2. Incluez `UnblockedResourceLoader.php` dans votre projet.

#### Via Composer

1. Exécutez `composer require lexprodsas/unblocked-resource-loader` pour ajouter ce paquet aux dépendances de votre projet.
2. Incluez le fichier d'auto-chargement de Composer dans votre projet : `require 'vendor/autoload.php';`


### Routage d'URL

Pour que toutes les URL commençant par `/link` appellent ce module, vous pouvez utiliser l'une des méthodes suivantes :


#### Pour les serveurs Apache

Ajoutez les lignes suivantes à votre fichier `.htaccess` :

```apache
RewriteEngine On
RewriteRule ^link/(.*)$ /path/to/UnblockedResourceLoader.php?url=$1 [L,QSA]
```


#### Pour les serveurs Nginx

Ajoutez la règle suivante à votre fichier de configuration Nginx (nginx.conf ou un fichier inclus) :

```nginx
location ~ ^/link/(.*)$ {
    rewrite ^/link/(.*)$ /path/to/UnblockedResourceLoader.php?url=$1 last;
}
```


#### Pour les routeurs PHP

Si vous utilisez un système de routage PHP, ajoutez une règle de routage pour rediriger les URLs commençant par `/link` vers ce module.

```php
$request = $_SERVER['REQUEST_URI'];

if (preg_match('#^/link/#', $request)) {
    require '/path/to/UnblockedResourceLoader.php';
    exit;
}
```


### Utilisation

Pour une installation manuelle :

```php
require_once 'UnblockedResourceLoader.php';

$loader = new UnblockedResourceLoader();
$loader->execute();
```

Pour une installation via Composer :

```php
require 'vendor/autoload.php';

$loader = new UnblockedResourceLoader\UnblockedResourceLoader();
$loader->execute();
```
