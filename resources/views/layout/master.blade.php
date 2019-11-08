<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AMS - @yield("title")</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
          <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><h2>Article Management System</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">{{__("message.home")}}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/change">Change Language</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        @yield('content')
        <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
          <div class="container text-center text-white-50">
            <small>Copyright &copy; Article Management System (AMS)</small>
          </div>
        </footer>
      </div>
    </div>
  </div>
</body>
</html>