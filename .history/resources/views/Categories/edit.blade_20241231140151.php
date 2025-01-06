@extends("layouts.app")
@section("title","Edit Category")
@section("body")
<form action="{{ route("Category.update",$Category->id)}}" enctype="multipart/form-data" method="POST">
    @method("POST")@csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row ">
                <div class="col-6">
                    <div class="mt-2 mb-2">
                        <label for="word" class="form-label">Word</label>
                        <input  class="form-control" value="{{$Category->word}}" id="word" name="word">
                    </div>
                    <div class="mt-2 mb-2">
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <a class="btn btn-dark" href="{{ route("Category")}}" type="submit">Back</a>
                    </div>
                    <div class="text-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                          @endforeach
                    </div>
                </div>

            </div>
        </div>
</div>
</form>
@endsection
