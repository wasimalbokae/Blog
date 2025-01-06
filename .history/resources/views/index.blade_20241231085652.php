@if (Auth::user())
    <h1>Hello {{ Auth::user()->name }}</h1>
    <h1>Your Email is  {{ Auth::user()->email }}</h1>
    <a href="{{route("posts")}}">posts</a>
    <form class="pt-2" action="{{route("logout")}}" method="POST">
        @method("POST")
        @csrf
        <button class="btn btn-secondary" type="submit">logout</button>
    </form>
@endif
