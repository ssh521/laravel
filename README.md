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
git checkout -t  origin/breeze
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

## Starter Kits

### Breeze & Blade
```
composer require laravel/breeze --dev
```
```
php artisan breeze:install
```
```
php artisan migrate
npm install
npm run dev
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
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```
```
php artisan lang:add ko
```

### Flowbite 설치
> [Flowbite install guide](https://flowbite.com/docs/getting-started/laravel/)

```
npm install -D tailwindcss postcss autoprefixer flowbite
```

tailwind.config.js:

    module.exports = {
        content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
        ],
        theme: {
        extend: {},
        },
        plugins: [
            require('flowbite/plugin')
        ],
    }