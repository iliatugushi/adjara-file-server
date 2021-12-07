# Requirements

Application is created using framweork Laravel, to run this app following requirements has to be met on platform:

-   PHP >= 7.2.5
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   MySql

Also platform has to have composer installed. The database name and all required information is located in .env file.

# Installation

After all requirements are met, there are several command that has to be executed to run the project:

`composer install`

_This command will install all composer required libraries for system to work._

`php artisan key:generate`

_This command will create key for project._

`php artian migrate:fresh --seed`

_This command will migrate all the tables, and store them to database, also it will run the seeders._

---

`php artisan optimize:clear`

_This command will clear all the cache._

# Configuration

## Configuration files are located in .env file and also in in /config Folder

To indicate root directory for pictures you need to change in config/filesystems files_root disk location

# System Structure & Folders

As system is made on Laravel framework, we have mvc structure.

## Views

All The Views are located in resources/views folder structured.

## Models

All The models are located in app/models folder.

## Controllers

All the controllers are located in app/Http/Controllers Folder.

## Routes

All the routes are located in "routes" folder

## Database Migrations and Seeders

### Migrations

Database migrates with tables structures can be found in following directory: /database/migrations

### Seeders

Database seeders with tables structures can be found in following directory: /database/seeders

## Functional & Technical Description

The application is developed in Laravel Framework, so we have mvc structure.

### Models

System has following Models, which are located in /app/Models folder, each model has its corresponding Controllers which will be discussed below:

#### File

ეს არის ფაილის მოდელი

#### Sakme

ეს არის საქმის მოდელი

# Controllers

კონტროლერები არის განთავსებული: /app/Http/Controllers

#### ApiController

ეს არის კონტროლერი რომელიც ამუშავებს API მოთხოვნებს, რომელბიც არის შემდეგი:

-   getSakmeFiles() - ეს ფუნქცია აბრუნებს საქმის მიხედვით ფაილებს, დინამიურად
-   getFile() - ეს ფუნქცია აბრუნებს ფაილს

#### HomeController

ეს არის კონტროლერი რომელიც გამოიყენება ქეჩის გასასუფთავებლად შემდეგი ფუნციით:
startPage() - მარტივი დამატების ინტერფეისის view ს დაბრუნება
sakmeNew() - საქმის დამატება
fileNew() - ფაილის დამატება

# Views

Views ეს არის ფაილები სადაც მონაცემების განთავსება ხდება blade ფაილები, html css js ...
welcome.blade.php - მარტივი დამატების ინტერფეისი

# Routes

### web.php

ეს არის საწყისი გვერდის დაბრუნებისთვის
Route::get('/', [HomeController::class, 'startPage'])->name('startPage');

ახალი საქმის ჩაწერა ბაზაში
Route::post('/sakme-new', [HomeController::class, 'sakmeNew'])->name('sakmeNew');

ახალი ფაილის ჩაწერა ბაზაში
Route::post('/file-new', [HomeController::class, 'fileNew'])->name('fileNew');

### api.php

ეს route ემსახურება საქმის იდენტიფიკატორის გადმოცემით შესაბამისი ფაილების დაბრუნებას JSON ფორმატში დინამიურად
Route::post('/get-sakme-files', [ApiController::class, 'getSakmeFiles']);

ეს route ემსახურება ფაილის დაბრუნებას JSON ფორმატში
Route::post('/get-file', [ApiController::class, 'getFile']);
