@extends('layouts.app')
@section('content')
<div class="welcome">
    <h1><img src="{{ asset('PhotoLo_logo/PhotoLo_logo3.png') }}" alt="PhotoLo Logo" width="550"></h1>
    @auth
    <a class="btn" href="{{ route('home') }}">マイページ</a>
    <a class="btn" href="{{ route('locations.create') }}">投稿する</a>
    @else
    <a class="btn" href="{{ route('register') }}">会員登録</a>
    <a class="btn" href="{{ route('login') }}">ログイン</a>
    @endauth
</div>

@endsection()