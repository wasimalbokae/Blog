@extends("layouts.app")
@section("title","Show Post")
@section("body")
 <style>
    .text-12
    {
        font-size: 12px;
    }
    .text-14
    {
        font-size: 14px;
    }
   .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit:contain;
}
 </style>
{{-- <div class="container">
    <div class="row">
        <div class="mt-3 mb-3 col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
            <div class="card">
                <div id="post_{{$post->id}}" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        User : {{ $post->user->name }}
                        <p>Category: {{ $post->category->title }}</p>
                        @foreach ($post->tags as $tag)
                        {{ $tag->word }}
                        @endforeach
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
                        @if (Auth::user()->id==$post->id_user)
                            <a href="{{route('posts.edit',$post->id)}}" class="m-2 btn btn-secondary">Edit</a>
                            <a href="{{route('posts.delete',$post)}}" class="m-2 btn btn-danger">Delete</a>
                        @endif
                    </div>
                    <div class="comments">
                        <form action="{{route('comments.store', $post->id)}}" method="POST">
                            @method("POST")
                            @csrf
                            <input type="text" name="content">
                            <button type="submit">Enter</button>
                        </form>

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
        </div>
    </div>
    @if(@session('error'))
    <h1 class="text-danger">  {{session('error')}}</h1>
    @endif
</div> --}}



<div class="container">
    <div class="row">
        <div class="container mt-3 mb-3 ">
            <div class="row d-flex align-items-center justify-content-center ">
                <div class="col-6">
                    <div class="card carousel slide carousel-fade" id="post_{{$post->id}}">
                        <div class="row d-flex  justify-content-between p-2 px-3">
                            <div class="col-6 row d-flex align-items-start">
                                    <div class=" col-12 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <img class="rounded-circle" src="/images/users/{{json_decode($post->user->image)}}" width="60" height="60">
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex flex-column mt-2">
                                                    <span class="align-items-start font-weight-bold">{{$post->user->name}}</span>
                                                    <small class="text-12">
                                                        @if (!empty($post->updated_at))
                                                        {{ $post->updated_at->diffForHumans() }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-14 ms-2  text-primary text-end">
                                            @foreach ($post->tags as $tag)
                                            {{ $tag->word }}
                                            @endforeach
                                        </small>
                                    </div>
                                    <div class="col-12 ms-2">
                                        <small class="col-12 text-info-emphasis">{{$post->title}}</small>
                                    </div>
                                    <div class="col-12 ms-2 ">
                                        <p class="fs-5"> {{ $post->description }}</p>
                                    </div>
                            </div>
                            <div class=" col-6 text-end d-flex  mt-1 ellipsis">
                                <small class="col-12 p-2">
                                    <div class="d-flex justify-content-end">
                                          <h6 class="text-end">
                                        {{ $post->category->title }}  <i class="fas fa-list-alt"></i>
                                        </h6>
                                    </div>
                                </small>
                            </div>
                        </div>
                        <div class="img col-12">
                            <div class="carousel-inner" style="height: 400px" >
                                @if(!empty($post->image))
                                        @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                                        @if ($index===0)
                                        <div class="carousel-item active" id="{{$img}}">
                                                <img   src="/images/posts/{{$img}}" class="img-fluid d-block w-100" alt="Not Found">
                                        </div>
                                        @else
                                        <div class="carousel-item " id="{{$img}}">
                                            <img  src="/images/posts/{{$img}}" class="img-fluid d-block w-100" alt="Not Found">
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
                        <div class="p-2">
                            <hr>
                            <div class="d-flex justify-content-center align-items-center ">
                                <p class="fw-bolder"><i class="fa fa-commenting"></i> {{ $total }} @if($total>1) Comments @else Comment  @endif</p>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('comments.store', $post->id)}}" method="POST">
                                        @method("POST")
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control"  name="content" placeholder="Enter Your Opinion">
                                            <span class="input-group-text">
                                                <button type="submit" class="btn"><i class="fas fa-paper-plane"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                             <div class="comments">
                                @foreach ($post->comments as $comment)
                                <div class="container">
                                    <div class="card d-flex row mb-2 border border-secondary">
                                        <div class="card-body">
                                            <form action="{{ route('comments.destroy', ["id_post"=>$post->id,"id"=>$comment->id]) }}" method="POST">
                                                @method("POST")
                                                @csrf
                                                <input class="bg-dark form-control bg-white" value="{{ $comment->content }}" type="text" name="edit_content">
                                                @if(@session('error'))
                                                <h6 class="text-danger">  {{session('error')}}</h6>
                                                @endif

                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <img src="/images/users/{{json_decode($comment->user->image)}}"  width="35" height="35" />
                                                        <h6 class="small mb-0 ms-2">{{ $comment->user->name }}</h6>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center text-body">

                                                                @if (Auth::user()->id==$comment->user->id || Auth::user()->id==$post->id_user)
                                                                    <button type="submit"  class="btn ">
                                                                        <i class="fas fa-trash text-danger" ></i>
                                                                        <span class="small mb-0 text-danger">Delete</span>
                                                                    </button>
                                                                @endif
                                                                @if (Auth::user()->id==$comment->user->id)
                                                                        <button type="submit" formaction="{{ route('comments.edit',$comment->id) }}"  formmethod="POST" class="btn">
                                                                            <i class="fas fa-edit" ></i>
                                                                            <span class="small mb-0">Update</span>
                                                                        </button>
                                                                @endif
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(@session('error'))
    <h1 class="text-danger">  {{session('error')}}</h1>
    @endif
</div>


























@endsection

