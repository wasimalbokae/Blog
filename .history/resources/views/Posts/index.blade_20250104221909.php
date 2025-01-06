@section("title","Posts")
@extends("layouts.app")
@section("body")
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<div class="container">
        <h1 class="text-center">Blogs</h1>
        @if (Auth::user())
        <a href="{{route('posts.create')}}" class="btn btn-warning">+</a>
        @endif
        <div class="row">
            @foreach ($posts as $post )
            <div class="container mt-3 mb-3 ">
                <div class="row d-flex align-items-center justify-content-center ">
                    <div class="col-6">
                        <div class="card">
                            <div class="row d-flex  justify-content-between p-2 px-3">
                                <div class="col-6 row d-flex align-items-start">
                                        <div class=" col-12 ">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img class="rounded-circle" src="images/users/{{json_decode($post->users->image)}}" width="60" height="60">
                                                </div>
                                                <div class="col-9">
                                                    <div class=" d-flex flex-column mt-2">
                                                        <span class="align-items-start font-weight-bold">{{$post->users->name}}</span>
                                                        <small class="col-12 align-items-start text-primary text-start">{{$post->title}}</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <small class="ms-2 align-items-end text-dark text-end">
                                                @if (!empty($post->updated_at))
                                                {{ $post->updated_at->diffForHumans() }}
                                                @endif
                                            </small>
                                        </div>
                                </div>
                                <div class=" col-6 text-end d-flex flex-row mt-1 ellipsis">
                                    <small class="col-12 p-2">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown">
                                                <i class="fas fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><span class="dropdown-item"><i class="fas fa-pen mx-2"></i> Update </li>
                                                    <li><span class="dropdown-item"><i class="fas fa-trash mx-2"></i> Delete</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </small>
                                </div>
                            </div>
                            @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                            <img src="/images/posts/{{$img}}" class="img-fluid">
                            @endforeach
                            <div class="p-2">
                                {{-- <p class="text-justify">{{$post->description}}.</p> --}}
                                <hr>
                                <div class="d-flex justify-content-between text-center align-items-center ">
                                    <div class="text-center">
                                            {{ $total }}   @if($total>1) Comments @else Comment  @endif
                                        </div>
                                    {{-- <div class="d-flex flex-row muted-color"> <span> </span>
                                        <span class="ml-2">
                                            @if($total>1) Comments @else Comment  @endif
                                        </span>
                                    </div> --}}
                                </div>


                                {{-- <hr> --}}
                                {{-- <div class="comments">
                                    <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">
                                        <div class="d-flex flex-column ml-2"> <span class="name">Omar Albokae</span> <small class="comment-text">I like this alot! thanks alot</small>
                                            <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/1YrCKa1.jpg" width="40" class="rounded-image">
                                        <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span> <small class="comment-text">Thanks for sharing!</small>
                                            <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>8 mins</small> </div>
                                        </div>
                                    </div>
                                    <div class="comment-input"> <input type="text" class="form-control">
                                        <div class="fonts"> <i class="fa fa-camera"></i> </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            {{-- <div class="mt-3 mb-3 col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                <div class="card ">
                    <div id="post_{{$post->id}}" class="carousel slide carousel-fade">
                        <div class="carousel-inner">
                    @if(!empty($post->image))
                            @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                            @if ($index===0)
                            <div class="carousel-item active" id="{{$img}}">
                                    <img  height="200" src="/images/posts/{{$img}}" class="d-block w-100" alt="Not Found">
                            </div>
                            @else
                            <div class="carousel-item " id="{{$img}}">
                                <img height="200" src="/images/posts/{{$img}}" class="d-block w-100" alt="Not Found">
                        </div>
                            @endif
                        @endforeach
                    </div>
                        @if (count($imgs)>1)
                        <button class="carousel-control-prev" id="post_{{$post->id}}" data-bs-target="#post_{{$post->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next"  id="bpost_{{$post->id}}"   data-bs-target="#post_{{$post->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                        @endif
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-success text-center">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('posts.show',$post->id)}}" class="m-2 btn btn-primary">Show</a>
                            @if (Auth::user()->id==$post->id_user)
                            <a href="{{route('posts.edit',$post->id)}}" class="m-2 btn btn-secondary">Edit</a>
                            <a href="{{route('posts.delete',$post)}}" class="m-2 btn btn-danger">Delete</a>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">
                            @if (!empty($post->updated_at))
                            {{ $post->updated_at->diffForHumans() }}
                            @endif
                        </small>
                    </div>
                </div>
            </div> --}}
            @endforeach
        </div>
        @if(@session('error'))
        <h1 class="text-danger">  {{session('error')}}</h1>
        @endif
</div>
@endsection

