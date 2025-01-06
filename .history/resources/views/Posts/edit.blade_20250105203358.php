@extends("layouts.app")
@section("title","Edit Post")
@section("body")
<form action="{{ route("posts.update",$post->id)}}" enctype="multipart/form-data" method="POST">
    @method("POST")@csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row ">
                <div class="col-6">
                    <div class="mt-2 mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input  class="form-control" value="{{$post->title}}" id="title" name="title">
                    </div>
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="1">{{$post->description}}</textarea>
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="image" class="form-label">Files</label>
                        <input class="form-control" type="file" id="image" name="image[]" multiple>
                    </div>
                    <div class="mt-2 mb-2">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    <a class="btn btn-dark" href="{{ route("posts")}}" type="submit">Back</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-center">
                        <div id="post_{{$post->id}}" class="w-75  carousel slide carousel-fade">
                            <div class="carousel-inner">
                            @if (!empty($post->image))
                                @foreach ($imgs=json_decode($post->image)  as $index=> $img )
                                @if ($index===0)
                                <div class="carousel-item active" id="{{$img}}">
                                        <img height="500" src="/images/posts/{{$img}}" class="d-block w-100" alt="...">
                                </div>
                                @else
                                <div class="carousel-item " id="{{$img}}">
                                    <img  height="500" src="/images/posts/{{$img}}" class="d-block w-100" alt="...">
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
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
@endsection
