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


</form>
@if($errors->any())
<div class="d-flex justify-content-end align-items-end text-center">
    <div class="toast show">
        <div class="toast-header">
          <strong class="me-auto">Toast Header</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <h6 class="text-danger">{{$errors->first()}}</h6>
        </div>
    </div>
</div>
@endif
@endsection
