@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('locations.update', $location) }}" method="post" enctype="multipart/form-data">
    @method('patch')
    @include('locations.form')
    <button type="submit">更新する</button>
    <a href="{{ route('locations.show', $location) }}">キャンセル</a>
</form>
@endsection()