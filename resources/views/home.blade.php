@extends('layouts.app')
@section('content')
<h1 class="page-heading">マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん</p>
<p><a class="btn" href="{{ route('locations.create') }}">投稿する</a></p>
<div id="map" style="height:500px">
    </div>
    <script src="{{asset('/js/result.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBTp8VE_C7cWPeWGn63ouc8BJMz6EvRP4E&callback=initMap" async defer>
    </script>

<div id="include">
    @include('locations.locations')
</div>
@endsection()