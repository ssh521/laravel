# laravel
 라라벨 시작하기

## Install

```
laravel new laravel
```
```
cd laravel
```
```
code .
```
```
composer install
```
```
npm install
```
```
php artisan key:generate
```
```
npm run build
```
```
php artisan serve
```

## DB setting

mysql db 생성하기  
  
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

# Awesome Laravel 책

## Package 설치

### 라라벨 디버그바 설치

#### 설치
```
composer require barryvdh/laravel-debugbar
```

#### config/debugbar.php 생성하기

```
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```

#### config/app.php 내용추가
```
    'providers' => [
                Barryvdh\Debugbar\ServiceProvider::class,
    ]

    'aliases' => Facade::defaultAliases()->merge([
        'Debugbar' => Barryvdh\Debugbar\Facades\Debugbar::class,
    ])->toArray(),

```
