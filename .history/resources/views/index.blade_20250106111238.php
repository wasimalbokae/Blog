@extends("layouts.app")
@section("title","index")
@section("body")
@if (Auth::user())
    <h1>Hello {{ Auth::user()->name }}</h1>
@endif
@endsection

