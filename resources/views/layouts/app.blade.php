<!DOCTYPE html>
  <html>
    <head>
      
    
     <link type="text/css" rel="stylesheet" href="{{asset('../resources/css/bootstrap.css')}}"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  
      <script src="https://code.jquery.com/jquery-3.6.0.js" ></script> 
   

      <title>@yield('title')</title>
    
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

@include('layouts.navbar')

<div class="container">
{{-- debut du contenu--}}
    @yield('contenu')
{{-- debut du contenu--}}

</div>

  

      
      
    </body>
  </html>


