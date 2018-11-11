# VehicleDatabase

## Server

 - Laravel 5.6
   - [XML Document Parser](https://github.com/orchestral/parser)
   - [THE ICONIC Name Parser](https://github.com/theiconic/name-parser)

## Client
 - Vue.js 2.5
	- [Vuetify](https://vuetifyjs.com/en/)
	- [Vuex](https://vuex.vuejs.org/)
	- [Axios](https://www.axios.com/)

## Installation

 - Clone repository and change into directory
 - Install the API server
   - `cd server`
   - `composer install` 
- Set up sqlite database
  - `touch database/database.sqlite`
  - `cp .env.example .env`
  - `DB_DATABASE=/absolute/path/to/VehicleDatabase/server/database/database.sqlite`
  - `php artisan migrate`
- Import data
  - `php artisan db:seed`
  - If you get any errors during seeing run `composer dump-autoload`
 - Start the API server
	 - `php artisan server`
 - Install the client
	 - `cd client`
	 - `npm install`
 - Start the client server
	 - `npm run serve`
 -  If the API server is not running on `http://127.0.0.1:8000` you will need to update `client/vue.config.js`

## Usage

 - View a list of all vehicles, including manufacturer and model details
 - View and individual vehicle too see all details including the owner

### Tests
### Server

 - `cd server`
 - `vendor/bin/phpunit`

### Client

 - `cd client`
 - `npm run test:unit`

## ToDo

 - Authentication (JWT)
 - Additional views for Manufacturers and Models
 - Pagination of API response and client list views

   
