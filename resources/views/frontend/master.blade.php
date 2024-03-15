<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce Website</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
   @include('frontend.includes.style')
</head>

<body>
    <div class="page-wrapper">
        @include('frontend.includes.header')

        <main class="main">
           @yield('content')
        </main><!-- End .main -->

        @include('frontend.includes.footer')
    </div><!-- End .page-wrapper -->
   

    @include('frontend.includes.mobile-menu')
    <!-- Plugins JS File -->
   @include('frontend.includes.script')
</body>



</html>