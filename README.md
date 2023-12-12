# Psycho-Logisch-Team-10

## The project

Dit project is voor TLE 1 2023. Doel is om de jongeren met keuzestress beter inzicht te geven tot de keuzes die ze hebben.  
Team:

-   Lex
-   Niels
-   Joshua
-   Hamid

## Project ERD

## Install guide Laravel application

### Connecting to a local database

This project makes use of a hosted MySQL database

#### Prerequisites

Making use of a database, has the following prerequisites:

-   PHP installed
-   node.js installed

#### Database configuration

To set-up the database configuration, you should make use of the provided `.env` file and paste it in the project (can be found in Discord), under the same directory as the `.env.example` file. This `.env` file serves as the necessary configuration for the use of the hosted database server.

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

## Starting the Laravel application

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

## Install guide Python application

This guide is applicable for when wanting to use the program locally and not making use of Docker:

### Prerequisites

To make use of the Python application for AI related actions on application data, the following things are required:

-   Python installed (If running locally)
-   Docker installed (If making use of Docker)
-   Postman for testing (recommended)

### Navigating to the project folder

To ensure that commands are correctly executed, you should navigate to the following folder:

```bash
/insights
```

### Setup virtual environment

To avoid installing required project packages globally, a virtual environment should be set-up. In this way, the installed libraries are contained in the scope of the project.

```bash
py -m pip install virtualenv
```

```bash
py -m venv {your-environment-name}
```

```bash
{your-environment-name}/Scripts/activate
```

### Install the required packages

```bash
pip install -r requirements.txt
```

### Running the application

```bash
flask run
```

### Using the application

The Insights application should be ran alongside of the main project application. Through the use of both applications, AI related actions can be achieved.

### Functionality

Through the use of a Python API, seperate services are called that make use of primarily the Hugging Face Python library for AI related actions.

The API is communicated with through a seperate controller inside of the Laravel application

## Using Docker

Docker is set-up for this application, so the use of the Insights API service can be managed in an easier way. By using / running the given Docker container, the user can avoid having problems with installation of the API requirements because of the Python version, OS problems etc. This is because instead of running the Python API locally, the API can be ran on a Docker container.

### Configuration

#### Dockerfile

The Dockerfile contains the steps that the Docker container will perform when running the command for setting it up on your local machine: The insights folder (the entire API) will be copied into the Docker container, along with the .env file defined in the project. This .env file should be used for performing database related actions from inside of Dockerized Insights API to the defined database

#### Docker compose file

The docker-compose.yml file includes further configuration for when running the Docker container. The used port to connect to the API service should match the port used to make requests to the service.

### Installation

Ensure that you are inside the correct folder for executing Docker commands:

```bash
/Psycho-Logisch-Team-10
```

Building the Docker container (Similar to installing necessary packages). This process executes the defined commands inside of the Dockerfile. This process might take a while, seeing how all required packages have to be installed each time the Docker container is built:

```bash
docker build -t insights-app .
```

Running the Docker container (Similar to starting a development server):

```bash
docker run -p 5000:5000 insights-app
```

Stopping the Docker container (Similar to stopping a development server):

```bash
CTRL + Z
```

or:

'docker ps' to get the id of the Docker container:

```bash
docker ps
```

Stopping the container:

```bash
docker stop {container id}
```

### Usage

When having ran the Docker container, one can make requests to it like you would to any other API. Instead of using a local address (like 127.0.0.1), you will have to make use of localhost. When making a request, you will have to call the defined port

Important: the port (indicated by the -p tag), should match the defined port inside of the docker-compose.yml file. If we have a host port of 5000 and a container port of 80 (as in the example for installation: 5000:80), we should make use of this port when sending a request. For example:

```bash
http://localhost:5000/psychoLogischInsights/summarizeReflection
```

### Database configuration

Currently the database connection doesn't work properly when using Docker. While the service can be approached when making a request to the Dockerized service, the service currently fails to make a database related action. This is because the Insights API is configured to make use of a local Postgres database, while the API itself is Dockerized. Necessary configuration should be done to the `.env`, the `app.py` and possibly the Docker files to either connect to a database on a different server, or to Dockerize the database itself as well.

## Development guide

To ensure that developers follow the same development guidelines, a development guide has been defined.

### Front-end

---

#### Styling

Styling is done through the use of Tailwind

_Syntax example:_

```html
{{-- Tailwind styling example --}}
<div class="flex items-center justify-center space-x-10">
    <svg
        viewBox="0 0 62 65"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        class="h-16 w-auto bg-gray-100 dark:bg-gray-900"
    ></svg>

    <h1 class="text-3xl text-center text-white font-bold underline">
        Hello world!
    </h1>
</div>
```

#### Referencing files

The referencing of files is done through Vite syntax instead of the usual script syntax. This is because Vite is used to serve as a build tool for making use of external npm packages

_Syntax example:_

```html
<head>
    @vite('resources/css/app.css') @vite('resources/js/authors/author.js')
    @vite('resources/js/shared/regexHelper.js')
</head>
```

### Back-end

#### Question table

**Checking question types**
When checking if you should store an open or a closed question, you should do a check on the 'type' property of the Questions table. The 'type' property can have the following values: `open_question`, `scale_question` or `multiple_choice_question`

#### Using Postman

Using Postman for testing / using requests can serve as an useful tool to work with data, without having to use the application front-end. There are several things to keep in mind when using Postman

##### Using CSRF token

When calling web requests using Postman, it is necessary to add a CSRF token in the request headers when making a request.

_Retrieving_

The retrieval of a CSRF token can be done by calling the following request in Postman (can be found under the `misc` collection):

```markdown
http://127.0.0.1:8000/getCsrfToken
```

_Using_

When making a web call, add a new key under the 'Headers' section of your Postman request named `X-CSRF-TOKEN`, with the retrieved value as the input for the value field. Done correctly, this should look something like this:

```markdown
Key: X-CSRF-TOKEN | Value: lSjtNOpfyE8lSGrQQVyy3PbDYkUOhOSFlj14y4Mm
```
