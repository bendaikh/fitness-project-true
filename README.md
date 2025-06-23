## Installation Process

- Clone this repo `git clone git@github.com:websolutionus/wsus_laravel_global_setup.git`
- Change Directory to `cd wsus_laravel_global_setup`
- Create a database in your database server
- Copy the .env.example file Windows: `copy .env.example .env` Linux: `cp .env.example .env`
- Open .env file and add database information previously created on step-3
- Install Packeges `composer install`
- Generate key `php artisan key:generate`
- Install Node Modules `npm install`, `npm run build`
- Migrate Database `php artisan migrate`
- Run Server `php artisan serve`
- Browse http://localhost:8000
