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

## sanctum
```
composer require laravel/sanctum
```
```
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```
### API 토큰 사용하기
```
class User extends Authenticatable
{
    use HasApiTokens;
}
```
tokens(), tokenCan(), createToken()   

### 토큰 생성 및 삭제하기
```
php artisan make:controller Auth\\TokenController -r
```
```
Route::resource('tokens', \App\Http\Controllers\Auth\TokenController::class)
    ->only(['create', 'store', 'destroy']);
```

### 권한 구분하기
```
touch app/Enums/Ability.php
```
```
namespace App\Enums;

enum Ability: string
{
    case POST_CREATE = 'post:create';
    case POST_READ = 'post:read';
    case POST_UPDATE = 'post:update';
    case POST_DELETE = 'post:delete';
}
```
```
class TokenController extends Controller
{
    public function create(): View
    {
        return view('tokens.create', [
            'abilities' => Ability::cases(),
        ]);
    }
}
```
```
php artisan make:request StoreTokenRequest
```
```
namespace App\Http\Requests;

use App\Enums\Ability;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreTokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'abilities.*' => [new Enum(Ability::class)],
        ];
    }
}
```
```
public function store(StoreTokenRequest $request): RedirectResponse
{
    $user = $request->user();
    $token = $user->createToken($request->name, $request->abilities);
    return back()
        ->with('status', $token->plainTextToken);
}
```
```
// Auth/TokenController

public function destroy(Request $request, PersonalAccessToken $token): RedirectResponse
{
    $user = $request->user();
    $user->tokens()->where('id', $token->id)->delete();
    return back();
}
```
```
//namespace App\Http\Controllers\Dashboard;

class TokenController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        return view('dashboard.tokens', [
            'tokens' => $user->tokens,
        ]);
    }
}
```
```
    <ul>
        @foreach ($tokens as $token)
            <li>
                <strong>{{ $token->name }}</strong>

                @foreach ($token->abilities as $ability)
                    <span>{{ $ability }}</span>
                @endforeach

                <form action="{{ route('tokens.destroy', $token) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">토큰 삭제</button>
                </form>
            </li>
        @endforeach
    </ul>
```