@extends('layouts.app')
@section('content')
@include('commons.errors')
    <form action="{{ route('locations.store') }}" method="post" enctype="multipart/form-data">
        @include('locations.form')
        <button type="submit">投稿する</button>
        <a href="{{ route('locations.index') }}">キャンセル</a>
    </form>
@endsection()