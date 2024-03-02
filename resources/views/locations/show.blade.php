@extends('layouts.app')
@section('content')
<location class="location-detail">
    <h1 class="location-title">{{ $location->title }}</h1>
    <div class="location-images"><img src="{{ asset('storage/' . $location->images_path) }}" alt="notFound" width="500"></div>
    <p>{{$path}}</p>
    <div class="location-info">{{ $location->created_at }}</div>
    <div class="location-body">{!! nl2br(e($location->body)) !!}</div>
    @can('update', $location)
    <div class="location-control">
        <a href="{{ route('locations.edit',$location)}}">編集</a>
        <form action="{{ route('locations.destroy', $location) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
    @endcan
</location>
@endsection