@extends('layouts.app')

@section('title', '새로운 블로그 만들기')

@section('content')
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf

        블로그이름 : <input type="text" id="name" name="name" value="{{ old('name') }}">
        블로그 표시이름 : <input type="text" id="display_name" name="display_name" value="{{ old('display_name') }}">

        <button type="submit">블로그 만들기</button>
    </form>
@endsection
