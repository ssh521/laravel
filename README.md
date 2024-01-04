# laravel
 라라벨 시작하기

## Install

terminal 을 열고
```
git clone https://github.com/ssh521/laravel.git
```

브랜치 선택
```
cd laravel
git branch -r
git checkout -t  origin/awesome
```

복사하기 .env.example into .env
```
cp .env.example .env
```

키 생성하기
```
php artisan key:generate --ansi
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

### User Seed
```
php artisan db:seed
```

### 다국어
```
php artisan lang:publish
```
#### config/app.php 수정
    'locale' => 'ko',
    'fallback_locale' => 'ko',


#### package 설치
```
composer require laravel-lang/lang --dev
```
```
composer require laravel-lang/publisher
```
```
lang:publish
```
```
php artisan lang:add ko
```

### 라우터 추가
```
touch routes/auth.php
php artisan route:list
```

### Password Rule
```
php artisan make:rule Password
```

### Session Table 생성
```
php artisan session:table

php artisan migrate
```

### Blog

```
php artisan make:model Blog --all
```

```
php artisan vendor:publish --tag="laravel-pagination"
```

### Flowbite

```
npm install -D tailwindcss postcss autoprefixer flowbite
```
```
npx tailwindcss init -p
```