## Versions

- PHP - ^8.1
- Laravel - ^10.8

## Steps to install

#### Go to the root path of the project and run these commands in the terminal

- composer install
- cp .env.example .env
- php artisan key:generate

#### Create the database and enter the details in the .env file and run these commands in the terminal

- php artisan migrate
- php artisan db:seed
