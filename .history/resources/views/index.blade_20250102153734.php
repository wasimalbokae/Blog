<body>
<h1>asd</h1>
@extends("layouts.app")
@section("title","index")
@section("body")
    {{-- <h1>Hello {{ Auth::user()->name }}</h1>
    <h1>Your Email is  {{ Auth::user()->email }}</h1> --}}
    <a class="btn btn-dark" href="{{route("posts")}}">posts</a>
    <form class="pt-2" action="{{route("logout")}}" method="POST">
        @method("POST")
        @csrf
        <button class="btn btn-secondary" type="submit">logout</button>
    </form>
@endsection
</body>

