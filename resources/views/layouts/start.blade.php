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
      <title>Spilling Beans - Start</title>
   </head>
   <body>
      @yield('content')
      <div class="modal fade" id="eliminated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg_remove">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 m-auto text-center">
                        <div class="start-card-wrapper popup_height">
                           <div class="player-msg-text-box">
                              <div>
                                 <div class="gift delete_btn">
                                    <img src="/assets/img/delete.png"/>
                                 </div>
                                 <h2>{{\Session::has('eleminated')?\Session::get('eleminated'):''}}</h2>
                                 <h6 class="draw_text">ELIMINATED</h6>
                              </div>
                           </div>
                           <button type="button" class="close delete_close ELIMINATED" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"><img src="/assets/img/close.png"</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="/assets/js/numscroller-1.0.js"></script>
      <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
      <script type="text/javascript" src="/assets/js/main.js"></script>
      <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

      <script>
         //wow js
         new WOW().init();
         if ("{{\Session::has('eleminated')}}") {
            $('#eliminated').modal('show');
         }
         if ("{{\Session::has('winner')}}") {
            $('#winner').modal('show');
         }

         $(".login-form input").focus(function(){
            if(window.outerWidth < 767) {
             $(".char-wrappers").hide();
           }
         });
         $(".login-form input").focusout(function(){
            if(window.outerWidth < 767) {
             $(".char-wrappers").show();
           }
         });
         $(document).ready(function() {
            var loser1 = '{{isset($_GET["loser"])?$_GET["loser"]:''}}';
            var loser1Val = $('#player-'+loser1).attr('data-beans');
            var winner = '{{isset($_GET["winner"])?$_GET["winner"]:''}}';
            var stake = '{{isset($_GET["stake"])?$_GET["stake"]:''}}';
            var winnerVal = $('#player-'+winner).attr('data-beans');
            var loser2 = '{{isset($_GET["loser2"])?$_GET["loser2"]:''}}';
            var group = '{{isset($_GET["group"])?$_GET["group"]:''}}';
            var loser2Val = $('#player-'+loser2).attr('data-beans');
            var pot = $('.content-pot').attr('data-pot');
            var potBeans = '{{isset($_GET["pot"])?$_GET["pot"]:''}}';
            if (loser1 && loser2) {
              plusMinus('minus', loser1Val, 1, "#player-"+loser1);
              plusMinus('minus', loser2Val, 1, "#player-"+loser2);
              plusMinus('plus', pot, 2, ".content-pot");
            }
            if (winner && loser1 && stake) {
                plusMinus('minus', loser1Val, stake, "#player-"+loser1);
                plusMinus('plus', winnerVal, stake, "#player-"+winner);
            }
            if (loser1 && !loser2 && !winner) {
                plusMinus('minus', loser1Val, 2, "#player-"+loser1);
                plusMinus('plus', pot, 2, ".content-pot");
            }
            if (winner && group) {
                plusMinus('plus', winnerVal, group, "#player-"+winner);
                plusMinus('minus', pot, pot, ".content-pot");
                plusMinus('minus', pot, potBeans, ".content-pot");
            }
         });

         function plusMinus(type, t, c, clss) {
           if (type == 'plus') {
             var i = t - c;
           } else {
             var i = Number(t) + Number(c);
           }

           setInterval(function () {
             if (type == 'plus' && t > i) {
               i++;
               $(clss).text(''+i+'');
             } else if (type == 'minus' && t < i) {
               i--;
               $(clss).text(''+i+'');
             }
           }, 500);
         }
      </script>
   </body>
</html>
