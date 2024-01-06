@extends('layouts.app')

@section('title', '마이페이지')

@section('content')

    <x-auth-card>

        <div class="w-full mx-auto max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ config('app.name') }} 개인정보</h5>
                <h2 class="mt-2">{{$user->name}}</h2>
                <h2 class="mt-2">{{$user->email}}</h2>
                <div class="mt-4 text-sm font-medium text-gray-500 dark:text-gray-300">
                    <a href="{{ route('profile.edit') }}" class="text-blue-700 hover:underline dark:text-blue-500">개인정보 수정하기</a>
                </div>
        </div>
        
    </x-auth-card>

@endsection
