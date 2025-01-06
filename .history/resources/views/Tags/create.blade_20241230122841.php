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
            <div class="text-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                  @endforeach
            </div>
        </form>
    </div>
@endsection
