@extends('layouts.app')
@section('map')
<div id="map" style="height:500px">
    </div>
    <script src="{{asset('/js/result.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBTp8VE_C7cWPeWGn63ouc8BJMz6EvRP4E&callback=initMap" async defer>
    </script>
@endsection()