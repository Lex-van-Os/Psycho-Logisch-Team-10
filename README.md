# Psycho-Logisch-Team-10
## The project
Dit project is voor TLE 1 2023. Doel is om de jongeren met keuzestress beter inzicht te geven tot de keuzes die ze hebben.  
Team:
- Lex
- Niels
- Joshua
- Hamid

## Project ERD



## Installation

### Connecting to a local database
This project makes use of a hosted MySQL database

#### Prerequisites
Making use of a database, has the following prerequisites:
- PHP installed
- node.js installed

#### Database configuration
To set-up the database configuration, you should make use of the provided `.env` file and paste it in the project, under the same directory as the `.env.example` file. This `.env` file serves as the necessary configuration for the use of the hosted database server.

### Installing Laravel packages
After having done the correct configuration, you should install the necessary project libraries using the command:

```bash
composer install
```

### Installing npm packages
To make compilation via Vite possible, npm packages should also be installed:

```bash
npm install
```

#### Troubleshooting installation errors
Sometimes the program may give installation errors during the installation of the necessary libraries. In this case, please attempt deleting the vendor folder and running the above mentioned command again.

### Running migrations
After having successfully created the database, you can automatically add the corresponding tables with the following command:
```bash
php artisan migrate
```

### Running seeders (to be added later)
Having added the tables, test data is to be inserted using the following command:
```bash
php artisan db:seed
```

## Starting the application
To run the application, two processes have to be started in two seperate terminals. Both are to be executed in the project root folder:

### Running the development server
The following command starts the development server:
```bash
php artisan serve
```

### Running Vite
The following command runs the project application builder; Vite:
```bash
npm run dev
```

## Development guide
To ensure that developers follow the same development guidelines, a development guide has been defined.

### Front-end

#### Styling
Styling is done through the use of Tailwind

*Syntax example:*
```html
{{-- Tailwind styling example --}}
<div class="flex items-center justify-center space-x-10">
    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
    </svg>

    <h1 class="text-3xl text-center text-white font-bold underline">
        Hello world!
    </h1>
</div>
```


#### Referencing files
The referencing of files is done through Vite syntax instead of the usual script syntax. This is because Vite is used to serve as a build tool for making use of external npm packages

*Syntax example:*
```html
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/authors/author.js')
    @vite('resources/js/shared/regexHelper.js')
</head>
```

### Back-end