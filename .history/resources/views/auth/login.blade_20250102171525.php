@extends("layouts.app")
@section("title","login")
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
    <h1>  {{$errors->first()}}</h1>
    @endif
</form>
@
