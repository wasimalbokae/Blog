@extends("layouts.app")
@section("title","Creat Category")
@section("body")
    <div class="container">
        <form action="{{route("Category.store")}}" enctype="multipart/form-data" method="POST">
            @method("POST")
            @csrf
            <div class="mt-2 mb-2">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" id="title" name="title">
            </div>
            <div class="mt-2 mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mt-2 mb-2">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" id="image" name="image" type="file">
            </div>

            <div class="mt-2 mb-2">
                <button class="btn btn-primary" type="submit">Add</button>
                <a class="btn btn-dark" href="{{ route("Category")}}" type="submit">Back</a>
            </div>

            <div class="toast border-danger show position-fixed bottom-0 end-0 p-1">
                <div class="toast-header bg-danger">
                    <strong class="me-auto text-white">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" ></button>
                </div>
                <div class="toast-body bg-white">
                    <h6 class="text-dark">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </h6>
                </div>
            </div>

        </form>
    </div>
@endsection
