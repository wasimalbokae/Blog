@if (Auth::user())
    <h1>Hello</h1>
    <form class="pt-2" action="{{route("logout")}}" method="POST">
        @method("POST")
        @csrf
        <button class="btn btn-secondary" type="submit">logout</button>
    </form>
@endif
