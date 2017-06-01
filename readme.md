## Drodmin V3.1.1

Drodmin is a simple seudo-CMS or initializer pack to create simple and fast web aplications or websites writed in Laravel framework 5.1 LTS.

## New features and fixes

* CKEditor Updated
* Country selector for links
* Solve listing in admin/pages
* New softDeleting behaviour for pages.
	* list trashed, delete trashed and restore
* List users in admin panel
* Reset password behaviour added
* Username fiald added (hidden)
* Seeds to init countries and categories

## Installation

Just clone the repository and run 
* $ composer install
* $ npm install
* Create and configure .env file
* $ php artisan make migrate
* $ php artisan db:seed
* $ php artisan serve

## Usage

Use the route '/auth/register' to create your account and go to your databse to change the role of your user to 'Admin'.
Login in the admin area in this route 'admin/pages'


## There is no documentation

Is a personal project, so I don't write documentation

### Visit my web

You can visit my web to see other projects. [KalvinManson](http://kalvinman.com)
