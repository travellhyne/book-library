### Rio's Book Library

# Configuration
This app uses sqlite as its database. Set `DB_DATABASE` to the **absolute** path of the sqlite database inside the `database` folder.

# Initialize
Run `composer install && npm install && gulp`.

Then run `php artisan migrate` to initialize the sqlite database.
