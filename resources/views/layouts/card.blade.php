<!DOCTYPE html>
<html>
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
      <link href="/assets/css/main.css" rel="stylesheet">
      <link href="/assets/css/responsive.css" rel="stylesheet">
      <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
      <link rel="stylesheet" href="https://use.typekit.net/ovh8ogg.css">
      <!-- Favicon -->
      <link rel="shortcut icon" href="/assets/img/favicon.png"/>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-GCGHPWM9X8"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-GCGHPWM9X8');
      </script>
      <title>Spillin Beans</title>
   </head>
   <body >
     @yield('content')
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
      <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
      <script type="text/javascript" src="/assets/js/main.js"></script>
      <script>
         //wow js
         new WOW().init();

         if ("{{$card->sub_type == 'CHALLENGE'}}") {
           $('#card').hide();
           $('.start-wrapper').show();
         }
      </script>
   </body>
</html>
