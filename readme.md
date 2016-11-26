### Rio's Book Library

# Configuration
Rename `.env.example` to `.env`.

This app uses sqlite as its database. Set `DB_DATABASE` to the **absolute** path of the sqlite database inside the `database` folder.

# Initialize
* Change directory to project root
* Run `composer install && npm install && gulp`.
* Run `touch database/database.sqlite` to create the database.
* Run `php artisan migrate` to initialize the sqlite database.
* Run `php artisan db:seed` to add contents to the database.
