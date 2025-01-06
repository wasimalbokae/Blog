@section("title","Posts")
@extends("layouts.app")
@section("body")
<div class="container">
    <div class="m-2 d-flex align-items-center justify-content-end">
        @if (Auth::user())
        <a href="{{route('posts.create')}}" class="btn btn-warning"><i class="fas fa-plus-square"></i> Add Blog</a>
        @endif
    </div>
        <div class="row">
            @if(@session('error'))
            <div class="toast border-danger show position-fixed bottom-0 end-0 p-1">
                <div class="toast-header bg-danger">
                    <strong class="me-auto text-white">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" ></button>
                </div>
                <div class="toast-body bg-white">
                    <h6 class="text-dark">  {{session('error')}}</h6>
                </div>
            </div>
            @endif
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
                                                    <img class="rounded-circle" src="images/users/{{json_decode($post->user->image)}}" width="60" height="60">
                                                </div>
                                                <div class="col-9">
                                                    <div class=" d-flex flex-column mt-2">
                                                        <span class="align-items-start font-weight-bold">{{$post->user->name}}</span>
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
                                @if (Auth::user())
                                <div class=" col-6 text-end d-flex flex-row mt-1 ellipsis">
                                    <small class="col-12 p-2">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown " >
                                                <i class="fas fa-ellipsis-v fs-5"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{route('posts.show',$post->id)}}" class="btn dropdown-item">
                                                        <li><i class="fas fa-eye mx-2"></i> Show</li>
                                                    </a>
                                                    @if (Auth::user()->id==$post->id_user)
                                                    <a href="{{route('posts.delete',$post)}}" class="btn dropdown-item">
                                                        <li><span class="dropdown-item"><i class="fas fa-trash text-danger mx-2"></i> Delete</span></li>
                                                    </a>
                                                    <a href="{{route('posts.edit',$post->id)}}" class="btn dropdown-item">
                                                        <li><span class="dropdown-item"><i class="fas fa-pen mx-2"></i> Update </li>
                                                    </a>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </small>
                                </div>
                                @endif

                            </div>
                            <div class="card carousel slide carousel-fade" id="post_{{$post->id}}">
                                <div class="img-post col-12">
                                    <div class="carousel-inner" >
                                        @if(!empty($post->image))
                                                @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                                                @if ($index===0)
                                                <div class="carousel-item active" id="{{$img}}">
                                                        <img   src="/images/posts/{{$img}}" class="img-fluid w-100 h-100 object-fit-contain" alt="Not Found">
                                                </div>
                                                @else
                                                <div class="carousel-item " id="{{$img}}">
                                                    <img  src="/images/posts/{{$img}}" class="img-fluid w-100 h-100 object-fit-contain" alt="Not Found">
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                            @if (count($imgs)>1)
                                            <button class="carousel-control-prev" id="post_{{$post->id}}" data-bs-target="#post_{{$post->id}}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next"  id="post_{{$post->id}}"   data-bs-target="#post_{{$post->id}}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                            </button>
                                            @endif
                                            @endif
                                </div>
                            </div>
                            <div class="p-2">
                                <hr>
                                <div class="d-flex justify-content-center align-items-center ">
                                    <p class="fw-bolder">{{ $post->comments_count }} @if($total>1) Comments @else Comment  @endif</p>
                                </div>
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
</div>
@endsection

