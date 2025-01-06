@extends("layouts.app")
@section("title","index")
@section("body")
@if (Auth::user())
    <h1 class="text-secondary">Hello {{ Auth::user()->name }}</h1>
@endif
@endsection

