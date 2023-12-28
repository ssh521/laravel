# laravel
 라라벨 시작하기

## Install

terminal 을 열고
```
git clone https://github.com/ssh521/laravel.git
```
```
cp .env.example .env
```
```
php artisan key:generate
```
```
composer install
```
```
npm install
```
```
npm run build
```
```
php artisan serve
```

## DB setting

mysql에 laraveldb 생성하기  
  
.env 수정

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laraveldb
    DB_USERNAME=laraveldb
    DB_PASSWORD=*******

```
php artisan migrate
```



