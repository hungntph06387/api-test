<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
 <div class="container">
     <h3>History convert</h3>
     @if(Session::get('success'))
         <div class="alert alert-success">
             {{ Session::get('success') }}
         </div>
     @endif
     <table class="table">
         <thead>
         <tr class="bg-info">
             <th scope="col">#</th>
             <th scope="col">Str</th>
             <th scope="col">To</th>
             <th scope="col">Mode</th>
             <th scope="col">RomajiSystem</th>
             <th scope="col">Result</th>
         </tr>
         </thead>
         <tbody>
         @foreach($historys as $history)
         <tr>
             <th scope="row">{{$history->id}}</th>
             <td>{{$history->str}}</td>
             <td>{{$history->to}}</td>
             <td>{{$history->mode}}</td>
             <td>{{$history->romajiSystem}}</td>
             <td>{{$history->cv}}</td>
             <td>
                 <a href="/delete/{{ $history->id }}" class="btn btn-warning btn-block" role="button" aria-pressed="true">Delete</a>
             </td>
         </tr>
         @endforeach
         </tbody>
     </table>
 </div>
</body>
</html>
