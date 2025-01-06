

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>@yield("title")</title>
<div class="container-fluid">
        @if (Auth::user())
        <div class="row pt-2 bg-info-subtle text-info-emphasis">
            <div class="col-12 d-flex justify-content-end">
                <h6>Name:{{ Auth::user()->name }}</h6>
                <h6>Email:{{ Auth::user()->email }}</h6>
                <form class="pt-2" action="{{route("logout")}}" method="POST">
                    @method("POST")
                    @csrf
                    <button class="btn btn-secondary" type="submit">logout</button>
                </form>
            </div>
        </div>
        @endif
        @yield("body")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
