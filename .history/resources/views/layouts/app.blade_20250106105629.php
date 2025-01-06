

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
    .text-12
    {
        font-size: 12px;
    }
    .text-14
    {
        font-size: 14px;
    }
    .img-post
    {
        height: 400px;
    }
    .carousel-control-next-icon,.carousel-control-prev-icon
    {
       filter: invert(3);
    }
    .dropdown
    {
        cursor: pointer;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<title>@yield("title")</title>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Demo Blogs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Posts</a>
          </li>
          @can('is_admin', Auth::user())
            <li class="nav-item">
                <a class="nav-link" href="#">Tags</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
          @endif


        </ul>
        @if (!request()->is('login') || request()->is('register'))
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user())
                    {{ Auth::user()->name }}
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if (Auth::user())
                        <form class="pt-2" action="{{route("logout")}}" method="POST">
                            @method("POST")
                            @csrf
                            <li><button class="btn btn-secondary dropdown-item" type="submit">logout</button></li>
                        </form>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                    @endif
                    @if (!request()->is('login') && !Auth::user())
                    <a class="dropdown-item" href="{{route("formLogin")}}" >Login</a>
                    <a class="dropdown-item" href="{{route("formLogin")}}" >Register</a>
                    @endif
                </ul>
            </li>
            </ul>
        @endif

      </div>
    </div>
</nav>
<div class="container-fluid">
    @if (Auth::user())
    <div class="row pt-2 bg-info-subtle text-info-emphasis">
        <a class="btn btn-dark" href="{{route("index")}}" >index</a>
            <h6>Email : {{ Auth::user()->email }}</h6>
            <a class="btn btn-dark" href="{{ route("users.edit",Auth::user()->id)}}" type="submit">Edit Profile</a>
            <div class="col-12 d-flex justify-content-end">

            </div>
    </div>
    @endif

        @yield("body")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
