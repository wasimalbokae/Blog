@extends("layouts.app")
@section("title","users")
    <style>
        .card-text
        {
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            min-height: 80px;
        }
    </style>
</head>
<body>
    @section("body")
    <div class="container">
        <a href="{{route('users.create')}}" class="btn btn-warning">+</a>
        <div class="row">
            @foreach ($users as $user )
            <div class="mt-3 mb-3 col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                <div class="card ">
                     <div class="card-body">
                        <h5 class="card-title text-success text-center">{{ $user->name}}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('users.show',$user->id)}}" class="m-2 btn btn-primary">Show</a>
                            <a href="{{route('users.edit',$user->id)}}" class="m-2 btn btn-secondary">Edit</a>
                            <a href="{{route('users.delete',$user->id)}}" class="m-2 btn btn-danger">Delete</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">
                            @if ( empty($user->updated_at))
                            {{ $user->created_at->diffForHumans() }}
                            @else
                            {{$user->updated_at->diffForHumans()}}
                            @endif
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection
</body>
</html>
