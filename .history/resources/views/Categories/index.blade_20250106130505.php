@section("title","Categories")
@extends("layouts.app")
@section("body")
<div class="container">
        <h1 class="text-center">Categories</h1>
        @can('is_admin',Auth::user())
        <a href="{{route('Category.create')}}" class="btn btn-warning">+</a>
        @endcan
        <div class="row">
            @if (!empty($Categories))

            <table class="table table-dark table-striped">
<thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">image</th>
      <th>#</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($Categories as $Category )
        <tr>
            <th scope="row">1</th>
            <td>{{$Category->title}}</td>
            <td>{{$Category->description }}</td>
            <td>

            </td>
            <td>
                <a href="{{route('Category.edit',$Category->id)}}" class="btn btn-warning">Edit</a>
                <a href="{{route('Category.delete',$Category->id)}}" class="btn btn-warning">Delete</a>
            </td>
            <td><img  height="50" width="50" src="/images/categories/{{json_decode($Category->image)}}" class="d-block" alt="Not Found"></td>
        </tr>
        @endforeach
    </tbody>
</table>





            @endif

        </div>
        @if(@session('error'))
        <h1 class="text-danger">{{session('error')}}</h1>
        @endif
</div>
@endsection

