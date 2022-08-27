
## How to run this app

1. Download from this repo:
   ```
   git clone git@github.com:Meressh/AutoPartInventory.git
   ```
2. ```
   cd AutoPartInventory
   ```
3. Run:
   ```
   composer install
   ```
4. Run:
   ```
   npm install
   ```
5. Optional -> If you are using docker you can run:
   ```
   docker compose up
   ```

   this commad create mysql and adminer for using this application. But if you have your own mysql server or so you can use your own
6. create .env and setup credentials and so
7. Run migrations:
   ```
   php artisan migrate
   ```
8. Optional -> If you want to seed (generate some data) your database use:
   ```
   php artisan db:seed
   ```
9. You have to use two terminals one for server and one for watcher?
10. Run server:
    ```
    php artisan serve
    ```
11. Run watcher(this builds your js if change was made) run in separate console:
    ```
    npm run dev
    ```

### Versions:

Laravel -> 9.26.1

php -> 8.1.2

nodejs -> v12.22.9

npm -> 8.5.1

mysql -> docker:latest

adminer -> docker:latest


## Info

I will sum up. What I have done. If i remember :)

1. Migrations was created
2. Models Car and Part was created
3. Vue was initialized
4. Scss was initialized
5. Fronted is made in vue
6. You can search data by simple search witch is in different component so props an emits was used also tables are components + navigation
7. CarController and PartController was created
8. Validation data in controler -> validator laravel. Some simple validaton on client side nothing special.
9. Docker was initialized and mysql and adminer was set for better compatibility
10. Factories and seeder was created for Car and Part model

    This list is not chronologically sorted. I wrote what came to my mind.

    Fronted -> ./resources

    Routes -> ./routes

    docker file for mysql -> ./docker-compose.yml

    controllers and so -> ./app

    databases - ./database

    scss -> ./resources/sass/

`<p align="center"><a href="https://laravel.com" target="_blank">``<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>``</p>`

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
