<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.admin.partitions.head')
   
</head>


<body>
@include('layouts.admin.partitions.nav')

   <div class="container-fluid">
     @include('layouts.admin.partitions.sidebar')
     <div class="col-10 ">
        @yield('content')
     </div>
   </div>
   @include('layouts.admin.partitions.footer')
</body>
<style>
     
</style>
</html>