@extends('layouts.app')

@section('title', '홈')

@section('content')
Home

@auth
    로그인
    @else
    게스트
@endauth

@endsection
