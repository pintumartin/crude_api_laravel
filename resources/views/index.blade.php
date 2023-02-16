<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <style>
      body {
        background-image: url('https://img.freepik.com/free-photo/house-investments-elements-assortment_23-2148793805.jpg');
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="https://www.tipsons.com/images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="Tipsons logo">
         
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/')}}">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/register/view')}}">Customer
              </a>
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
            <!-- other nav items -->
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/register')}}">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/register/login')}}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </body>
</html>