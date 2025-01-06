@extends("layouts.app")
@section("title","Edit Profile")
@section("body")
<form action="{{route("users.update",$user->id)}}" method="POST">
    @method("POST")@csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row ">
                <div class="col-6">
                    <div class="mt-2 mb-2">
                        <label for="title" class="form-label">Name</label>
                        <input  class="form-control" value="{{$user->name}}" id="name" name="name">
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password" >
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-check mt-2 mb-2">
                        @if ($user->is_admin==true)
                        <input class="form-check-input" type="checkbox" checked  name="is_admin" id="is_admin">
                        <label class="form-check-label" for="is_admin">Is Admin</label>
                         @else
                         <label class="form-check-label" for="is_admin">Is Admin</label>
                        <input class="form-check-input" type="checkbox"  name="is_admin" id="is_admin">
                        @endif

                    </div>
                    <div class="mt-2 mb-2">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    <a class="btn btn-dark" href="{{ route("users.index")}}" type="submit">Back</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="text-danger">
    @foreach ($errors->all() as $error)
    {{ $error }}
      @endforeach
</div>
</form>
@endsection
