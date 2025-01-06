@extends("layouts.app")
@section("title","login")
@section("body")
<form action="{{route("login")}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>

    @if($errors->any())
    <div class="toast border-danger show position-fixed bottom-0 end-0 p-1">
        <div class="toast-header bg-danger">
            <strong class="me-auto text-white">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" ></button>
        </div>
        <div class="toast-body bg-white">
            <h6 class="text-dark">  {{$errors->first()}}</h6>
        </div>
    </div>
    @endif
</form>
@endsection
