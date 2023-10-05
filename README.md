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

### Setup

Create a PHP file, for instance, `unblocked-resource-loader.php` in the **public directory** of your project with the following content:

```php
<?php
require '../vendor/autoload.php'; // Adjust the path according to your project structure

$loader = new UnblockedResourceLoader\UnblockedResourceLoader();
$loader->execute();

```

### URL Routing

Ensure all URLs starting with `/link` call the module by updating your server configuration:

#### For Apache Servers

Add the following lines to your `.htaccess` file:

```apache
RewriteEngine On
RewriteRule ^link/(.*)$ /unblocked-resource-loader.php?url=$1 [L,QSA]
```

#### For Nginx Servers

Add the following rule to your Nginx configuration file (nginx.conf or an included file):

```nginx
location ~ ^/link/(.*)$ {
    rewrite ^/link/(.*)$ /unblocked-resource-loader.php?url=$1 last;
}
```

### Usage
Refer to the "Setup" section for usage instructions as the setup ensures the `UnblockedResourceLoader` class is called when URLs starting with `/link` are accessed.

---

## Français

### Aperçu

**UnblockedResourceLoader** est un outil basé sur PHP conçu pour améliorer l'expérience de navigation de l'utilisateur en permettant le chargement fluide d'images et de liens externes, tout en tenant compte des limitations imposées par les bloqueurs de publicités. Cela garantit une expérience de navigation complète et non intrusive. 

### Installation

#### Installation manuelle

1. Clonez le dépôt.
2. Incluez `UnblockedResourceLoader.php` dans votre projet.

#### Via Composer

1. Exécutez `composer require lexprodsas/unblocked-resource-loader` pour ajouter ce paquet aux dépendances de votre projet.
2. Incluez le fichier d'auto-chargement de Composer dans votre projet : `require 'vendor/autoload.php';`


### Configuration

Créez un fichier PHP, par exemple, `unblocked-resource-loader.php` dans le répertoire public de votre projet avec le contenu suivant :
```php
<?php
require '../vendor/autoload.php'; // Adjust the path according to your project structure

$loader = new UnblockedResourceLoader\UnblockedResourceLoader();
$loader->execute();

```

### Routage d'URL

Pour que toutes les URL commençant par `/link` appellent ce module, vous pouvez utiliser l'une des méthodes suivantes :


#### Pour les serveurs Apache

Ajoutez les lignes suivantes à votre fichier `.htaccess` :

```apache
RewriteEngine On
RewriteRule ^link/(.*)$ /unblocked-resource-loader.php?url=$1 [L,QSA]
```


#### Pour les serveurs Nginx

Ajoutez la règle suivante à votre fichier de configuration Nginx (nginx.conf ou un fichier inclus) :

```nginx
location ~ ^/link/(.*)$ {
    rewrite ^/link/(.*)$ /unblocked-resource-loader.php?url=$1 last;
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

Référez-vous à la section "Configuration" pour les instructions d'utilisation, car la configuration assure que la classe `UnblockedResourceLoader` est appelée lorsque les URL commençant par `/link` sont accédées.