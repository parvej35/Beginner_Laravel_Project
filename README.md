<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Assessment:
    - Register and login as a user
    - An overview of the shortened URL's
    - The possibility to create, edit and delete shortened URL's
    - The functionality to be redirected from your shortened URL to the target URL
    
    Extra features:
    - API CRUD endpoint
    - Seeder for URL's and Users

### Project Configuration:
    1) Creating laravel project:
        composer create-project --prefer-dist laravel/laravel <application-name>

    2) Create a new Model and migration file:
        php artisan make:model Users -m
        php artisan make:model ShortenedUrls -m

    3) After that, open the migration file located in '/database/migrations/' directory. 
        Update the function up() like the following code:

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    
    4) Open model file located in 'app/Models/Users.php'. Set the fillable fields like below:

        protected $fillable = [
            'name', 'email', 'password'
        ];

    5) Open terminal and run the following command to create tables in the database:
        php artisan migrate

    6) Create controller By artisan command:
        php artisan make:controller UsersController

    7) After that, visit app/Http/controllers and open the AppUsersController.php file. Add functions, methods as required.

    8) Create Routes: Open the web.php file from the routes directory of laravel CRUD app. 
       Update the following routes into the web.php file:
        - Route::resource('users', UsersController::class);

### Create Seeder for URLs & Users: 
    Seeder is used to insert default or sample data into the database.

    1) Create Seeder file:
        php artisan make:seeder UsersTableSeeder 
        php artisan make:seeder ShortenedUrlsTableSeeder

    2) In the 'database/seeds' directory, new seeder files will be created.
    3) Inside the run method of the seeder, add the code to insert data into the DB.
    
    4) Run the below commmand to execute the seeder files at once:
        php artisan db:seed

        or 

        Execute seeder file one by one:

        php artisan db:seed --class=UsersTableSeeder
        php artisan db:seed --class=ShortenedUrlsTableSeeder

### Project Configuration (in fresh DB):
    1) Configure the database credentials in .env file
    
    2) If migration files do not exists in the 'database/migrations/' folder:
        a) Create the migration files of each Models:
            php artisan make:migration create_users_table
            php artisan make:migration create_shortened_urls_table
    
        b) Open the migration file located in '/database/migrations/' directory. 
        Update the function up() like the following code:

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

    3) Open terminal and run the following command to create tables in the database:
        php artisan migrate

    4) Run the below commmand to execute the seeder files:
        php artisan db:seed

### Clear cache files:
    php artisan cache:clear

### Run the application:
    php artisan serve
    
    ### To run the app in custom port ###
    php artisan serve --port=9090

### API List
List of APIs are location in 'routes/api.php' file.
