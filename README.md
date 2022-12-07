backbone-simplechat
======================
Simplechat Application based on BackboneJS and Laravel 8.75

This project, is based on Laravel PHP Framework and BackboneJS, is a simplechat application by assuming 2 persons chat in one computer. So it can not use for real live chat, but you can develop it for live chat. 


Installation
------------
You need to run `composer update` for getting core libraries such as Laravel PHP Framework, etc from Dependecies .


How To Use
------
#### Generate Laravel App Key First ####
	run CMD: php artisan key:generate

#### Set Database Values in .env.sample and Change File to .env ####
	DB_CONNECTION=mysql
	DB_HOST=XXX
	DB_PORT=XXX
	DB_DATABASE=XXX
	DB_USERNAME=XXX
	DB_PASSWORD=XXX

	
#### Create Tables in Database ####
	run CMD: php artisan migrate
