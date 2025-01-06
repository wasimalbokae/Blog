@extends("layouts.app")
@section("title","Tags")
@section("body")
    <div class="container">
        <form action="{{route("tags.store")}}" enctype="multipart/form-data" method="POST">
            @method("POST")
            @csrf
            <div class="mt-2 mb-2">
                <label for="word" class="form-label">word</label>
                <input class="form-control" id="word" name="word">
            </div>
            <div class="mt-2 mb-2">
                <button class="btn btn-primary" type="submit">Add</button>
                <a class="btn btn-dark" href="{{ route("tags")}}" type="submit">Back</a>
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
