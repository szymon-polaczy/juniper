<p align="center">
  <a href="https://osomstudio.com">
    <img alt="Juniper" src="https://5924544.fs1.hubspotusercontent-na1.net/hubfs/5924544/juniper/398672602-juniper-logo-01.png" height="300">
  </a>
</p>


<p align="center">
  <strong>Juniper - WordPress starter boilerplate + theme</strong>
</p>

## Overview

JuniperTheme is symbiosis of <a href="https://github.com/roots/bedrock">Bedrock</a> boilerplate and <a href="https://github.com/timber/timber">Timber</a>.

Bedrock is a modern WordPress stack that helps you get started with the best development tools and project structure.
Timber allows you to use twig templating system in your WP project.
With this approach you can create theme code with logic files separated from frontend.

## Features

- Easy WordPress configuration with environment specific files
- File structure which makes keeping and maintaining your project on a Git a lot easier
- Dependency management with [Composer](https://getcomposer.org)
- Twig templating system
- Bash console scripts to make creating project from the scratch much easier

## Requirements

- PHP >= 7.4
- Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- PHPCS & PHPCBF with WordPress-Extra standard installed

## Installation

1. Create local database as you would do for normal WP instance
2. Map project main catalogue to domain on your localhost
3. Start a new project:
   ```sh
   $ bash start.sh
   ```
   and follow the instructions in the console.
   Type in details from step 1 and 2. .env file will
   be crated for you (all DB and site details sits there)
4. Fill correct domain details in .htaccess in main catalogue.
5. Check if /web/ directory has .htaccess file with default WP entries.
6. Run 
   ```sh
   $ bash work.sh
   ```
   in main project directory
7. Start coding your theme in /web/app/themes/juniper-theme/ :)

## Composer dependencies

To maintain project correctly we insist you to use composer.json in main catalogue.

If you want to add new plugin to your project you can use [WPackagist](https://wpackagist.org/) - 
the only thing you need is plugin slug from the main WP repository.

You can update them with the same easy way by changing version in composer.json.

## Bash scripts

The main operations that we automate have been handled by below scripts: :

1) start.sh - used for the initial configuration of the project. Through this process, we areable to enter the basic data to the database, define the main URL and ACF key. After providing those information, the installer will generate an .env file, which in our case will contain all configuration data (as in wp-config.php in a vanilla WordPress installation).

2) work.sh - used every time you work on a project. It compiles the styles in real time by calling a parcel script to listen for file changes.

## WP-CLI Commands
 
1. Adding Custom Post Types - After getting the name, a CPT will be created. Its editing will of course be possible later, because this command will generate a file in the theme directory.
```sh
$ wp add cpt --name="Product"
```
2. Adding Taxonomies - Add a name of the taxonomy you want and the slug name of the posts you want it to be attached to and this command will take care of the rest
```sh
$ wp add taxonomy --name="Category" --post="product"
```
3. Adding Gutenberg Blocks - This creates a custom Gutenberg block for the user utilizin the ACF Timber Blocks solution which allows us to use one .twig file with the appropriate comment to create a block. Keywords and description fields are optional
```sh
$ wp add block --name="Reviews" --keywords="quote,stars" --description="Show three newest reviews"
```


## 
