@extends("layouts.app")
@section("title","posts")
@section("body")
    <div class="container">
        <form action="{{route("posts.store")}}" enctype="multipart/form-data" method="POST">
            @method("POST")
            @csrf
            <div class="">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" id="title" name="title">
            </div>
            <div class="">
                <label for="description" >Description</label>
                <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>
            <div class="">
                <label for="image" class="form-label">Files</label>
                <input class="form-control" type="file" id="image" name="image[]" multiple>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit">Add</button>
                <a class="btn btn-dark" href="{{ route("posts")}}" type="submit">Back</a>
            </div>
        </form>
    </div>
@endsection
