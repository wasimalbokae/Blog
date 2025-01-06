@extends("layouts.app")
@section("title","Edit Tag")
@section("body")
<form action="{{ route("tags.update",$tag->id)}}" enctype="multipart/form-data" method="POST">
    @method("POST")@csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row ">
                <div class="col-6">
                    <div class="mt-2 mb-2">
                        <label for="word" class="form-label">Word</label>
                        <input  class="form-control" value="{{$tag->word}}" id="word" name="word">
                    </div>
                    <div class="mt-2 mb-2">
                        <button class="btn btn-primary" type="submit">Edit</button>
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
                </div>
            </div>
        </div>
</div>
</form>
@endsection
