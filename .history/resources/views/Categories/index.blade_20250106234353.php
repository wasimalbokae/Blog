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
                                    <a href="{{route('Category.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                @endcan
                            </th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $Category )
                        <tr>
                            <td class="text-center align-middle">{{$Category->title}}</td>
                            <td class="text-center align-middle">{{$Category->description }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center text-center">
                                    <img  height="50" width="60" src="/images/categories/{{json_decode($Category->image)}}"  alt="Not Found">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-end">
                                    <div class="pt-2 pb-2">
                                        <a href="{{route('Category.edit',$Category->id)}}" class="btn btn-secondary">Edit</a>
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
            <div class="toast border-danger show position-fixed bottom-0 end-0 p-1">
                <div class="toast-header bg-danger">
                    <strong class="me-auto text-white">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" ></button>
                </div>
                <div class="toast-body bg-white">
                    <h6 class="text-dark">
                        {{session('error')}}
                    </h6>
                </div>
            </div>
        @endif



</div>
@endsection

