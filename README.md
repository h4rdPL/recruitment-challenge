<div >
    
### Tech Stack

  <ul>
    <li>Laravel</li>
    <li>PHPUnit</li>
  </ul>

### Database

  <ul>
    <li><a href="https://www.mysql.com/">MySQL</a></li>
  </ul>

### Features

- Repository Design Pattern
- PHPUnit
- Blade (UI)

<!-- Env Variables -->

### Environment Variables

To run this project, you will need to change file name from .env.example to
.env

## Getting Started

### Prerequisites

This project uses Laravel, composer and php.

<a href="https://laravel.com/docs/11.x/installation">Laravel Installation guide</a>
<br />
<a href="https://getcomposer.org/download/">Composer</a>
<br />
<a href="https://www.php.net/downloads.php">PHP</a>
<br />
<a href="https://www.apachefriends.org/pl/download.html">Xampp server</a>

### Installation

Clone the project

```bash
  git clone https://github.com/h4rdPL/recruitment-challenge

  or download .zip file
```

Go to the project directory

```bash
  cd project_name
```

```bash
 composer install
```

```bash
 php artisan key:generate
```

<!-- Running -->

### Running

To run project, run the following command

```
run xampp and apache server
```

```bash
php artisan serve
```

Create database in localhost/phpmadmin

```
Database name: laboratoryapiproject
```

Migrate the database

```
php artisan migrate
```

Seed the database

```
php artisan db:seed
```

Run in browser:

```
127:0.0.1:8000/tests
```

Application endpoints

```
    127:0.0.1:8000/tests - list of all tests

    127:0.0.1:8000/tests/create - form used to create the tests

    127:0.0.1:8000/categories - list of all categories

    127:0.0.1:8000/categories/create - form used to create the categories

    127:0.0.1:8000/categories/list/{category_number} - Returns all tests belonging to a given category
```
