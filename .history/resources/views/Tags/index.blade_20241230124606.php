@section("title","Posts")
@extends("layouts.app")
@section("body")
<div class="container">
        <h1 class="text-center">Tags</h1>
        @can('is_admin',Auth::user())
        <a href="{{route('tags.create')}}" class="btn btn-warning">+</a>
        @endcan
        <div class="row">
            @foreach ($tags as $tag )
            <h1>{{$tag->word}}</h1>
            @endforeach
        </div>
        @if(@session('error'))
        <h1 class="text-danger">{{session('error')}}</h1>
        @endif
</div>
@endsection

