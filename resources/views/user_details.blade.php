<!doctype html>
<html>
    <head>  
    </head>
    <body class="cms-index-index index-opt-1">
      
       @foreach($user_data as $user_dat)
          {{ $user_dat->User->email}}
       @endforeach
    </body>
</html>