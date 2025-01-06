

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
      <a class="navbar-brand" href="#">Navbar w/ text</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">logout</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              @if (!request()->is('login') && !Auth::user())
              <a class="btn btn-dark" href="{{route("formLogin")}}" >Login</a>
              @endif
            </ul>
        </li>
        </ul>
        <span class="navbar-text">

            @if (Auth::user())
            <form class="pt-2" action="{{route("logout")}}" method="POST">
                @method("POST")
                @csrf
                <button class="btn btn-secondary" type="submit">logout</button>
            </form>
            @endif
        </span>
      </div>
    </div>
  </nav>
<div class="container-fluid">
    @if (Auth::user())
    <div class="row pt-2 bg-info-subtle text-info-emphasis">
        <a class="btn btn-dark" href="{{route("index")}}" >index</a>
            <h6>Name : {{ Auth::user()->name }}</h6>
            <h6>Email : {{ Auth::user()->email }}</h6>
            <a class="btn btn-dark" href="{{ route("users.edit",Auth::user()->id)}}" type="submit">Edit Profile</a>
            <div class="col-12 d-flex justify-content-end">

            </div>
    </div>
    @endif

        @yield("body")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
