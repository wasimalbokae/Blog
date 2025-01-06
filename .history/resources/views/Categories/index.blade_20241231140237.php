@section("title","Categories")
@extends("layouts.app")
@section("body")
<div class="container">
        <h1 class="text-center">Categories</h1>
        @can('is_admin',Auth::user())
        <a href="{{route('Category.create')}}" class="btn btn-warning">+</a>
        @endcan
        <div class="row">
            @foreach ($Categories as $Category )
            <h1>{{$Category->word}}</h1>
            <a href="{{route('Category.edit',$Category->id)}}" class="btn btn-warning">Edit</a>
            @endforeach
        </div>
        @if(@session('error'))
        <h1 class="text-danger">{{session('error')}}</h1>
        @endif
</div>
@endsection

