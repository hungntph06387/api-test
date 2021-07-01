<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src= "https://malsup.github.io/jquery.blockUI.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

 <div class="container">
     <div class="my-header">
         <div class="mycontainer">
             <!--START NAVBAR -->
             <div class="navbar">
                 <div class="logo">
                     <img src="/images/logo.jpg" alt="" width="125px">
                 </div>
                 <nav class="">
                     <ul>
                         <li><a href="/">Home</a></li>
                         <li><a href="#">About</a></li>
                         <li><a href="#">Contact</a></li>
                         <li><a href="/login">Login</a></li>
                     </ul>
                 </nav>

                 @if(Session::get('loggedUser'))
                     <a href="#">{{Auth::user()->name}}</a> / <a href="/logout">Logout</a>
                     {{--<img src="{{ Auth::user()->avatar }}" alt="Facebook Avatar" height="64" width="64">--}}
                 @endif
             </div>
         </div>
     </div>

     <div class="formControll">
     <h3>History convert</h3>
     @if(Session::get('success'))
         <div class="alert alert-success">
             {{ Session::get('success') }}
         </div>
     @endif
     <table class="table">
         <thead class="thead-dark">
         <tr class="bg-dark">
             <th scope="col">#</th>
             <th scope="col">Str</th>
             <th scope="col">To</th>
             <th scope="col">Mode</th>
             <th scope="col">RomajiSystem</th>
             <th scope="col">Result</th>
             <th scope="col">Action</th>
         </tr>
         </thead>
         <tbody>
         @foreach($historys as $history)
         <tr>
             <th scope="row" class="bg-info">{{$history->id}}</th>
             <td>{{$history->str}}</td>
             <td>{{$history->to}}</td>
             <td>{{$history->mode}}</td>
             <td>{{$history->romajiSystem}}</td>
             <td>{{$history->cv}}</td>
             <td class="bg-info">
                 <a href="/delete/{{ $history->id }}" class="btn btn-warning btn-block" role="button" aria-pressed="true">Delete</a>
             </td>
         </tr>
         @endforeach
         </tbody>
     </table>
     </div>

     <div class="myfooter">
         <div class="mycontainer">
             <div class="myrow">
                 <div class="footer-col-1">
                     <h3>Dowload Our App</h3>
                     <p>Download App for Android and Ios mobile phone.</p>
                     <div class="app-logo">
                     </div>
                 </div>

                 <div class="footer-col-3">
                     <h3>Useful Links</h3>
                     <ul>
                         <li>Coupons</li>
                         <li>Blog Post</li>
                         <li>Return Policy</li>
                         <li>Join Affiliate</li>
                     </ul>
                 </div>
                 <div class="footer-col-4">
                     <h3>Follow US</h3>
                     <ul>
                         <li>Facebook</li>
                         <li>Twitter</li>
                         <li>Instagram</li>
                         <li>Youtobe</li>
                     </ul>
                 </div>
             </div>
             <hr>
             <p class="coppyright">Copyright 2021 | Translate</p>
         </div>
     </div>

 </div>
</body>
</html>
