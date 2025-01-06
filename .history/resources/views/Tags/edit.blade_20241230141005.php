@extends("layouts.app")
@section("title","Edit Tag")
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

            </div>
        </div>
</div>
</form>
@endsection
