@extends("layouts.app")
<head>
    @section("title","register")
</head>
<body>
<h1>register</h1>
<form action="{{ route("auth.register")}}"  method="POST">
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
    <div class="form-check mt-2 mb-2">
        @can('is_admin',Auth::user())
        <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
        <label class="form-check-label" for="is_admin">Is Admin</label>
        @endcan
    </div>
    <div class="mt-2 mb-2">
        <button class="btn btn-primary" type="submit">Register</button>
        @can('is_admin',Auth::user())
        <a class="btn btn-dark" href="{{ route("users")}}" type="submit">Back</a>
        @endcan
    </div>
    <div class="text-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
          @endforeach
    </div>
</form>

</body>
