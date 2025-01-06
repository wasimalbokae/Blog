@extends("layouts.app")
    @section("title","register")
    @section("body")
@php
    if(Auth::guest())
        $url="auth.register";
    else {
        $url="users.register";
    }
@endphp
<form action="{{route($url)}}"  method="POST" enctype="multipart/form-data">
    @method("POST")
    @csrf
    <div class="mt-2 mb-2">
        <label for="name" class="form-label">Name</label>
        <input  class="form-control" id="name" name="name">
    </div>
    <div class="mt-2 mb-2">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" id="email" name="email" >
    </div>
    <div class="mt-2 mb-2">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="password" id="password" name="password" >
    </div>
    <div class="mt-2 mb-2">
        <label for="password_confirmation" class="form-label">Password</label>
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div class="mt-2 mb-2">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="form-check mt-2 mb-2">
        @can('is_admin',Auth::user())
        <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
        <label class="form-check-label" for="is_admin">Is Admin</label>
        @endcan
    </div>
    <div class="mt-2 mb-2">
        <button class="btn btn-primary" type="submit">Register</button>
        @can('is_admin',Auth::user())
        <a class="btn btn-dark" href="{{ route("users.index")}}" type="submit">Back</a>
        @endcan
    </div>



    <div class="toast border-danger show position-fixed bottom-0 end-0 p-1">
        <div class="toast-header bg-danger">
            <strong class="me-auto text-white">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" ></button>
        </div>
        <div class="toast-body bg-white">
            <h6 class="text-dark">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </h6>
        </div>
    </div>

</form>

@endsection
