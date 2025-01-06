@section("title","Tags")
@extends("layouts.app")
@section("body")
<div class="container">
        @if (!empty($tags))
            <table class="table  table-striped">
                <thead>
                        <tr>
                            <th class="text-center" scope="col">Word</th>
                            <th class="text-end" scope="col">
                                @can('is_admin',Auth::user())
                                    <a href="{{route('tags.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                @endcan
                            </th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag )
                        <tr>
                            <td class="text-center align-middle">{{$tag->word}}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-end">
                                    <div class="pt-2 pb-2">
                                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-secondary">Edit</a>
                                        <a href="{{route('tags.delete',$tag->id)}}" class="btn btn-danger">Delete</a>
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

