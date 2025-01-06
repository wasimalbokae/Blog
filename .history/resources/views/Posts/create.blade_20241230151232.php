@extends("layouts.app")
@section("title","posts")
@section("body")
    <div class="container">
        <form action="{{route("posts.store")}}" enctype="multipart/form-data" method="POST">
            @method("POST")
            @csrf
            <div class="mt-2 mb-2">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2 mb-2">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" id="title" name="title">
            </div>
            <div class="mt-2 mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something">
                <label class="form-check-label" for="check1">Option 1</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
              <label class="form-check-label" for="check2">Option 2</label>
            </div>

            <div class="mt-2 mb-2">
                <label for="image" class="form-label">Files</label>
                <input class="form-control" type="file" id="image" name="image[]" multiple>
            </div>
            <div class="mt-2 mb-2">
                <button class="btn btn-primary" type="submit">Add</button>
                <a class="btn btn-dark" href="{{ route("posts")}}" type="submit">Back</a>
            </div>
            <div class="text-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                  @endforeach
            </div>
        </form>
    </div>
@endsection
