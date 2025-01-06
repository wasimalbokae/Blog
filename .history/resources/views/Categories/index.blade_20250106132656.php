@section("title","Categories")
@extends("layouts.app")
@section("body")
<div class="container">
        @if (!empty($Categories))
            <table class="table  table-striped">
                <thead>
                        <tr>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Description</th>
                            <th class="text-center" scope="col">image</th>
                            <th class="text-end" scope="col">
                                @can('is_admin',Auth::user())
                                    <a href="{{route('Category.create')}}" class="btn btn-warning">+</a>
                                @endcan
                            </th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $Category )
                        <tr>
                            <td class="text-center">{{$Category->title}}</td>
                            <td class="text-center">{{$Category->description }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img  height="50" width="60" src="/images/categories/{{json_decode($Category->image)}}"  alt="Not Found">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div>
                                        <a href="{{route('Category.edit',$Category->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('Category.delete',$Category->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if(@session('error'))
            <h1 class="text-danger">{{session('error')}}</h1>
        @endif
</div>
@endsection

