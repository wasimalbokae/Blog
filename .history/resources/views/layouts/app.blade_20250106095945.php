

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
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>
    @if (Auth::user())
    <div class="row pt-2 bg-info-subtle text-info-emphasis">
        <a class="btn btn-dark" href="{{route("index")}}" >index</a>
            <h6>Name : {{ Auth::user()->name }}</h6>
            <h6>Email : {{ Auth::user()->email }}</h6>
            <a class="btn btn-dark" href="{{ route("users.edit",Auth::user()->id)}}" type="submit">Edit Profile</a>
            <div class="col-12 d-flex justify-content-end">
                <form class="pt-2" action="{{route("logout")}}" method="POST">
                    @method("POST")
                    @csrf
                    <button class="btn btn-secondary" type="submit">logout</button>
                </form>
            </div>
    </div>
    @endif
    @if (!request()->is('login') && !Auth::user())
    <a class="btn btn-dark" href="{{route("formLogin")}}" >Login</a>
    @endif
        @yield("body")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
