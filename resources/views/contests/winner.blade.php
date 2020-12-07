@extends('layouts.start')
@section('content')
<section class="start-wrapper vertical-center">
   <div class="container">
   </div>
</section>
<div class="modal fade show" style="display: block" id="winner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="gift">
                     <img src="/assets/img/gift.png"/>
                  </div>
                  <div class="start-card-wrapper popup_height">
                     <div class="player-msg-text-box">
                        <div>
                           <h5 class="cong">CONGRATS!!</h5>
                           <h2>{{$winner->name}}</h2>
                           <h6 class="draw_text">YOU WON</h6>
                        </div>
                     </div>
                     <a href="javascript:;" onclick="openContinue()">
                       <button type="button" class="close cong_close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true"><img src="/assets/img/close.png"</span>
                       </button>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="continue_playing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="start-card-wrapper popup_height cont_play">
                     <div class="player-msg-text-box">
                        <div>
                           <h6 class="draw_text">DO YOU WANT TO<br/>
                              CONTINUE PLAYING?
                           </h6>
                           <div class="mob_next d-flex">
                              <a class="next-btn-space" href="/contests/{{$winner->contest_id}}/continue"> <button class="btn btn-next-pink yes_no" type="button">Yes</button></a>
                              <a class="next-btn-space " href="/"> <button class="btn btn-next-pink yes_no" type="button">No</button></a>
                           </div>
                        </div>
                     </div>
                     <button type="button" class="close delete_close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><img src="/assets/img/close.png"</span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

<script type="text/javascript">
  function openContinue() {
    $('#winner').css('display', 'none');
    $('#continue_playing').modal('show');
  }
</script>
