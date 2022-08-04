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
php artisan migrate
php artisan passport:install
php artisan serve
```
After the above commands, a local server will start and is accessible at http:://127.0.0.1:8000`.
Every request to the API will be made to this base URL.

#### Frontend
Run the following commands in their order after going back to the project folder with `cd ..`
```
cd octagon-test/ui
cp .env.example .env
npm install
npm run dev
```
The front end server will start and will be available at `http://localhost:5173`.

### Usage:

access the frontend and register, login and view profile.

### Enquiries
for all queries please contact me on
**Phone**: +256755337120
**Email**: ahullan[at]gmail.com
