@extends("layouts.app")
@section("title","Show Post")
@section("body")
<div class="container">
        <div class="row">
            <div class="mt-3 mb-3 col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div id="post_{{$post->id}}" class="carousel slide carousel-fade">
                        <div class="carousel-inner">
                            User : {{ Auth::user()->name }}
                            <p>Category: {{ $post->category->title }}</p>
                            @foreach ($post->tags as $tag)
                            {{ $tag->word }}
                            @endforeach
                    @if(!empty($post->image))
                            @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                            @if ($index===0)
                            <div class="carousel-item active" id="{{$img}}">
                                    <img  height="200" src="/images/{{$img}}" class="d-block w-100" alt="Not Found">
                            </div>
                            @else
                            <div class="carousel-item " id="{{$img}}">
                                <img height="200" src="/images/{{$img}}" class="d-block w-100" alt="Not Found">
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
                            <a href="{{route('posts.edit',$post->id)}}" class="m-2 btn btn-secondary">Edit</a>
                            <a href="{{route('posts.delete',$post)}}" class="m-2 btn btn-danger">Delete</a>
                        </div>
                        <div class="comments">
                            <form action="{{route('comments.store', $post->id)}}" method="POST">
                                @method("POST")
                                @csrf
                                <input type="text" name="content">
                                <button type="submit">Enter</button>
                            </form>
                            @foreach ($post->comments as $comment)
                            {{ $comment->content }} <br>
                           user name comment: {{  $comment->user->name  }}
                        ___________________________________ <br>
                           <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @method("POST")
                            @csrf
                            @if (Auth::user()->id==$comment->user->id || $comment->id_post==$post->id)

                            <button type="submit">Delete comment</button>
                            @endif

                            Edit
                            <input type="text" name="edit_comment" id="">
                            <button type="submit" formaction="{{ route('comments.edit', $comment->id) }}"  formmethod="POST" class="btn btn-danger">edit</button>
                           </form>
                            @endforeach
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
</div>


@endsection
