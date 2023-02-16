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
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Tipsons</a>
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
              <a class="nav-link " href="{{url('/register')}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/register/view')}}">Customer</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>  
      <form action="{{$url}}" method="post">
        @csrf
        <div class="container">
          <h1 class="text-center">Update Customer</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input type="name" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="{{$customer->name}}">
            <span class="text-danger">  
                @error('name')
                {{$message}}
                @enderror</span>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$customer->email}}">
          <span class="text-danger">
            @error('email')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Addresss</label>
          <textarea class="form-control" name='address'id="exampleFormControlTextarea1" rows="3" >{{$customer->address}}</textarea>
          <span class="text-danger">
            @error('address')
            {{$message}}
            @enderror
        </span>
        </div>
          <div class="form-group">
            <label for="">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="city" value="{{$customer->city}}">
            <span class="text-danger">
                @error('city')
                {{$message}}
                @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="">State:</label>
            <div>
            @php
          $states= array("Andhra Pradesh",
                "Arunachal Pradesh",
                "Assam",
                "Bihar",
                "Chhattisgarh",
                "Goa",
                "Gujarat",
                "Haryana",
                "Himachal Pradesh",
                "Jammu and Kashmir",
                "Jharkhand",
                "Karnataka",
                "Kerala",
                "Madhya Pradesh",
                "Maharashtra",
                "Manipur",
                "Meghalaya",
                "Mizoram",
                "Nagaland",
                "Odisha",
                "Punjab",
                "Rajasthan",
                "Sikkim",
                "Tamil Nadu",
                "Telangana",
                "Tripura",
                "Uttarakhand",
                "Uttar Pradesh",
                "West Bengal",
                "Andaman and Nicobar Islands",
                "Chandigarh",
                "Dadra and Nagar Haveli",
                "Daman and Diu",
                "Delhi",
                "Lakshadweep",
                "Puducherry");
                @endphp
          <select name="state" id="">       
             @foreach($states as $sta)
             @if(isset($customer->state))
             <option>{{$customer->state}}</option> 
             @endif
              <option value="{{$sta}}">{{$sta}}</option>
            @endforeach
          </select>
        </div>
          </div>
          
          <div class="form-group">
            <label for="">Country</label>
            <input type="text" name="country" class="form-control" id="country" placeholder="country" value="{{$customer->country}}">
            <span class="text-danger">
                @error('country')
                {{$message}}
                @enderror
            </span>
          </div>
          <div class="form-group">
            <div class="mt-4">Gender:</div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gend" value="male" id="flexCheckDefault"    {{$customer->gender=="male"?"checked":""}}>
                Male
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gend" value="female" id="flexCheckChecked"
              {{$customer->gender=="female"?"checked":""}} >
                Female
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gend" value="others" id="flexCheckChecked" 
              {{$customer->gender=="others"?"checked":""}}>
                Other
            </div>
            <br>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
            <span class="text-danger">
              @error('password')
              {{$message}}
              @enderror
            </span>
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" name="confirm_password"class="form-control" id="exampleInputPassword1" placeholder="confirm password">
              <span class="text-danger">
                  @error('confirm_password')
                  {{$message}}
                  @enderror
              </span>
            </div>
          <div class="form-group">
            <label for="">Dob</label>
            <input type="date" name="dob" class="form-control" id="dob" value="{{$customer->dob}}">
            <span class="text-danger">
                @error('dob')
                {{$message}}
                @enderror
            </span>
          </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </div>
      </form>
  </body>
</html>