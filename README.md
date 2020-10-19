## Instructions

Run composer install, then npm install && npm run dev

Configure the .env file to the appropriate user settings for the database connection, username, and password

Run the command php artisan key:generate
Run the command php artisan migrate
Seed the database in order of roles, users, images 
    php artisan db:seed --class=RoleSeeder
    php artisan db:seed --class=UserSeeder
    php artisan db:seed --class=ImageSeeder

Run the environment with php artisan serve
    