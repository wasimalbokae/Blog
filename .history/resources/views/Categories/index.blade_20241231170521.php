@section("title","Categories")
@extends("layouts.app")
@section("body")
<div class="container">
        <h1 class="text-center">Categories</h1>
        @can('is_admin',Auth::user())
        <a href="{{route('Category.create')}}" class="btn btn-warning">+</a>
        @endcan
        <div class="row">
            @if (!empty($Categories))
            @foreach ($Categories as $Category )
            <h1>{{$Category->title}}</h1>
            <h1>{{$Category->description}}</h1>
            <img  height="200" src="/images/{{$Category->image}}" class="d-block w-100" alt="Not Found">
            <a href="{{route('Category.edit',$Category->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{route('Category.delete',$Category->id)}}" class="btn btn-warning">Delete</a>
            @endforeach
            @endif

        </div>
        @if(@session('error'))
        <h1 class="text-danger">{{session('error')}}</h1>
        @endif
</div>
@endsection

