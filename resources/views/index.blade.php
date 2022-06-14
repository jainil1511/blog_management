<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="antialiased">
        <div style="margin-left: 170px;" class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-info">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
            <div class="container">
                <div class="row">
                    @if(count($blogs) > 0)
@foreach($blogs as $row)
                
                    <div class="col-md-4" style="margin-top:2%">
                <div class="card" style="width: 18rem;">
  <img  src="/images/{{$row->image}}" class="card-img-top" src="..." alt="Card image cap" height="160" width="120">
  <div class="card-body">
    <h5 class="card-title">{{$row->title}}</h5>
    <p class="card-text">{{$row->description}}</p>
  </div>
</div>
            </div>
       
        @endforeach
        @else
          <h1>No Blogs Found</h1>
        @endif

         </div>
            </div>
      
    </body>
</html>
