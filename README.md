# octagon-test

## About project
The project is an implementation of user authentication and 
authorization using a frontend talking to a backend through an oAuth2 secured API.

Below is the architecture of the system.

### Backend
- **Language**: PHP >= 8.0 and its extensions,
- **Framework**: Laravel >= 9.22,
- **API Security**: OAuth2 using Laravel Passport,
- **Database**: SQLite >= 3.0,
 **Packages**: Composer > 2.0

### Frontend
- **Language(s)**: Javascript,
- **Framework**: Javascript(Vue 3)
- **Packages**: CSS (Tailwind CSS >= 3.0), npm >= 7.20.5, node >= 14.15.0

## How to Install
The recommended environment is Linux, but the project can run on windows and mac OS when well configured.

Run `git clone https://github.com/allandereal/octagon-test.git`

#### Backend
Run the following commands in their order
```
cd octagon-test/api
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan passport:install
php artisan serve
```
After the above commands, a local server will start and is accessible at http:://127.0.0.1:8000`.  
Every request to the API will be made to this base URL.

**For testing the backend**, please run the following commands

```
cp .env.example .env.testing
php artisan key:generate --env=testing
touch database/database.testing.sqlite
```
At this point,  copy the absolute path of the newly created test database `database/database.testing.sqlite`  
and create a `DB_DATABASE` variable with the copied path as the value in the `.env.testing` file in the project root folder.
Then proceed with the commands below.
```
php artisan migrate --env=testing
php artisan passport:install --env=testing
php artisan test
```

#### Frontend
Run the following commands in their order after going back to the project root folder with `cd ..`
```
cd ui
cp .env.example .env
npm install
npm run dev
```
The front end server will start and will be available at [http://localhost:5173](http://localhost:5173).

### Accessing and navigating the project
_Please make sure the api (backend is running on [http://localhost:8000](http://localhost:8000))._  
Access the frontend and **register**, **login** and **view profile**.

### Enquiries
For all queries, please contact me on  

**Phone**: [+256755337120](tel:+256755337120)  
**Email**: [ahullan[at]gmail.com](mailto:ahullan@gmail.com)
