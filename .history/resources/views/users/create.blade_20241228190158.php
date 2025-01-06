@extends("layouts.app")
<head>
    @section("title","register")
</head>
<body>
    @section("body")
<h1>register</h1>
<form action="{{ route("auth.register")}}"  method="POST">
    @method("POST")
    @csrf
    <div class="mt-2 mb-2">
        <label for="name" class="form-label">Name</label>
        <input  class="form-control" id="name" name="name">
    </div>







<!--begin::Image input placeholder-->
<style>
    .image-input-placeholder {
        background-image: url('https://freesvg.org/img/generic-avatar.png');
    }

    [data-bs-theme="dark"] .image-input-placeholder {
        background-image: url('https://freesvg.org/img/generic-avatar.png');
    }
</style>
<!--end::Image input placeholder-->

<!--begin::Image input-->
<div class="image-input image-input-empty" data-kt-image-input="true">
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px"></div>
    <!--end::Image preview wrapper-->

    <!--begin::Edit button-->
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
    data-kt-image-input-action="change"
    data-bs-toggle="tooltip"
    data-bs-dismiss="click"
    title="Change avatar">
        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

        <!--begin::Inputs-->
        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="avatar_remove" />
        <!--end::Inputs-->
    </label>
    <!--end::Edit button-->

    <!--begin::Cancel button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
    data-kt-image-input-action="cancel"
    data-bs-toggle="tooltip"
    data-bs-dismiss="click"
    title="Cancel avatar">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
    <!--end::Cancel button-->

    <!--begin::Remove button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
    data-kt-image-input-action="remove"
    data-bs-toggle="tooltip"
    data-bs-dismiss="click"
    title="Remove avatar">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
    <!--end::Remove button-->
</div>
<!--end::Image input-->










    <div class="mt-2 mb-2">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" id="email" name="email" >
    </div>
    <div class="mt-2 mb-2">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="password" id="password" name="password" >
    </div>
    <div class="mt-2 mb-2">
        <label for="password_confirmation" class="form-label">Password</label>
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div class="form-check mt-2 mb-2">
        @can('is_admin',Auth::user())
        <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
        <label class="form-check-label" for="is_admin">Is Admin</label>
        @endcan
    </div>
    <div class="mt-2 mb-2">
        <button class="btn btn-primary" type="submit">Register</button>
        @can('is_admin',Auth::user())
        <a class="btn btn-dark" href="{{ route("users")}}" type="submit">Back</a>
        @endcan
    </div>
    <div class="text-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
          @endforeach
    </div>
</form>

</body>
@endsection
