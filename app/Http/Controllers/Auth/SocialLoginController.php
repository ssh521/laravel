<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Enums\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;


class SocialLoginController extends Controller
{
    /**
     * 서비스 제공자 리다이렉트
     */
    public function create(Provider $provider): SymfonyRedirectResponse
    {
        return Socialite::driver($provider->value)->redirect();
    }

    /**
     * 소셜 로그인
     */
    public function store(Provider $provider): RedirectResponse
    {
        
        try {
            $socialUser = Socialite::driver($provider->value)->user();
        }
        catch (InvalidStateException $e)
        {
            $socialUser = Socialite::driver($provider->value)->stateless()->user();
        }

        //dd($socialUser);
        
        if (!$socialUser)
        {
            return redirect('/error')->with('error', 'Bad credentials');
        };

        $user = $this->register($socialUser);

        auth()->login($user);

        session()->socialite($provider, $socialUser->getEmail());

        return redirect()->intended();
    }

    /**
     * 소셜 사용자 등록
     */
    private function register(SocialiteUser $socialUser): User
    {
        $user = User::updateOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName(),
            'password' => Hash::make($socialUser->getEmail()),
        ]);

        // 메일로 회원가입를 커펌하는 경우..소셜을 인증된거로 업데이트 해준다.
        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return $user;
    }
}
