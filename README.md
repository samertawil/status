1-composer require status/pkg
2- add provider path : status\Pkg\StatusServiceProvider::class
3- migration for table  : php artisan migrate
4-php artisan vendor:publish --provider="status\Pkg\StatusServiceProvider"
5-change local to be APP_LOCALE=ar
6-http://127.0.0.1:8000/status/create
