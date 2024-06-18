<!DOCTYPE html>
<html lang="es" dir="ltr">

  <head>
    @include('layouts.head')




  </head>


  <body>
      <main class="main" id="top">
          @include('layouts.nav')


          @yield('content')



          @include('layouts.footer')


          </main>

          @include('layouts.scripts')




  </body>

</html>
