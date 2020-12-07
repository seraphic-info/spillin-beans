<div class="modal fade" id="winloss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="start-card-wrapper popup_height">
                     <div class="player-msg-text-box">
                        <div>
                           <h2>{{$playerTurn->name}} @if(isset($playerWith)) AND {{$playerWith->name}}@endif</h2>
                           <h6 class="draw_text">DID YOU COMPLETE THE CARD?</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                           <div class="done_icon">
                             <?php
                                $perm = '';
                                if ($card->type == 'wild') {
                                    if ($card->sub_type != 'CHALLENGE') {
                                      $perm = '&type=wild&partner_id='.$playerWith->id;
                                    } else {
                                      $perm = '&type=wild&opponent_id='.$playerWith->id;
                                    }
                                }
                                if ($card->type == 'action') {
                                    $perm = '&type=action';
                                }
                              ?>
                             <a href="{{$card->id}}/result?result=win{{$perm}}">
                               <img src="/assets/img/done.png"/>
                             </a>
                           </div>
                           <div class="done_icon done_change">
                              <a href="{{$card->id}}/result?result=lose{{$perm}}">
                                <img src="/assets/img/unlike.png"/>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="wincard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="start-card-wrapper popup_height yes_no_bg won_bg">
                     <div class="player-msg-text-box">
                        <div>
                           <h6 class="draw_text">WHO WON?
                           </h6>
                           <div class="mob_next d-flex">
                              <a class="next-btn-space player1" href="card/result?result=win&type=wild&beans={{$atStake}}&opponent_id={{isset($playerWith)?$playerWith->id:''}}"> <button class="btn btn-next-pink yes_no" type="button">{{$playerTurn->name}}</button></a>
                              <a class="next-btn-space player2" href="card/result?result=lose&type=wild&beans={{$atStake}}&opponent_id={{isset($playerWith)?$playerWith->id:''}}"> <button class="btn btn-next-pink yes_no" type="button">{{isset($playerWith)?$playerWith->name:''}}</button></a>
                           </div>
                        </div>
                     </div>
                     <button type="button" class="close delete_close yes_no_btn who_btn" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><img src="/assets/img/close.png"></span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="gameleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="start-card-wrapper popup_height levae_game_bg">
                     <div class="player-msg-text-box">
                        <div>
                           <h6 class="draw_text">ARE YOU SURE YOU<br/>
                              WANT TO LEAVE<br/>
                              THE GAME?
                           </h6>
                           <div class="mob_next d-flex">
                              <a class="next-btn-space" href="/"> <button class="btn btn-next-pink yes_no" type="button">Yes</button></a>
                              <a class="next-btn-space " href="javascript:;"> <button class="btn btn-next-pink yes_no" type="button"  data-dismiss="modal" aria-label="Close">No</button></a>
                           </div>
                        </div>
                     </div>
                     <button type="button" class="close delete_close levae_game_btn" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><img src="/assets/img/close.png"</span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="bigbens" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg_remove">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 m-auto text-center">
                  <div class="start-card-wrapper popup_height yes_no_bg won_bg">
                     <div class="player-msg-text-box">
                        <div>
                           <h6 class="draw_text who">WHO WON?
                           </h6>
                           <div class="mob_next d-flex row">
                           @foreach($activePlayers as $player)
                           <div class="col-lg-6 col-6">
                             <a class="next-btn-space " href="{{$card->id}}/result?type=big-bean&winner_id={{$player->id}}&beans={{$atStake}}">
                               <button class="btn btn-next-pink yes_no all_btn " type="button">{{$player->name}}</button>
                             </a>
                           </div>
                           @endforeach
                          </div>
                        </div>
                     </div>
                     <button type="button" class="close delete_close yes_no_btn who_btn" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><img src="/assets/img/close.png"></span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('instructions')
