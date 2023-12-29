# laravel
 라라벨 시작하기 (Laravel Version v10.39.0)

## Install

terminal 을 열고
```
git clone https://github.com/ssh521/laravel.git
```

복사하기 .env.example into .env
```
cp .env.example .env
```

Package Download
```
composer install
```

키 생성하기
```
php artisan key:generate --ansi
```

서버 실행하기
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



