<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.admin.partitions.head')
   <link href="/css/app.css" rel="stylesheet">
   <link href="/css/userlist.css" rel="stylesheet">
   <link rel="stylesheet" href="/css/userlist.css">
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