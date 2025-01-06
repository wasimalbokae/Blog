@extends("layouts.app")
@section("title","Show User")
@section("body")
<div class="card container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card-body d-flex align-items-center justify-content-center">
                <div class="profile">
                    <div class="mb-3"><h2 class="card-title text-center fw-bold mb-4">Name = {{ $user->name}}</h2></div>
                    <img src="images/users/{{json_decode($user->image)}}" alt="">

                    <p class="card-text text-secondary mb-4 text-center">Email= {{$user->email}}</p>
                    <p class="card-text text-secondary mb-4 text-center">Is_admin=
                        @php
                        if($user->is_admin)
                            print("true");
                        else
                            print("false");
                        @endphp
                    </p>
                </div>
            </div>
            </div>
            <div class="col-12 mt-3 mb-3 ">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{route('users.delete',$user->id)}}" class="m-2 btn btn-danger">Delete</a>
                        <a class="m-1 col-6 w-25 btn btn-dark"  href="{{route('users.index')}}">Back</a>
                </div>
            </div>
        </div>
</div>
@endsection
