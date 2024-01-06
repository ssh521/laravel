@extends('layouts.app')

@section('title', '회원가입')

@section('content')

<x-auth-card>

    <div class="w-full mx-auto max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ config('app.name') }} 회원가입</h5>

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Your Name')}}</label>
                <input type="text" name="name" id="name" value="{{ old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Your Name" required>
            </div>            

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Your email')}}</label>
                <input type="email" name="email" id="email" value="{{ old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Your password')}}</label>
                <input type="password" name="password" id="password"  value="{{ old('password')}}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            </div>

            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Confirm Password')}}</label>
                <input type="password" name="password_confirmation" id="password_confirmation"  value="{{ old('password_confirmation')}}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            </div>            

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">회원가입</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500 ml-2">계정이 있으신가요?</a>
            </div>
    
            <div>
                @each('auth.social', $providers, 'provider')
            </div>
        </form>
    </div>
</x-auth-card>

@endsection
