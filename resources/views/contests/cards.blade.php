@extends('layouts.card')
@section('content')
<section>
  <div class="section action_background">
     <div class="container custom_can">
        <div class="row align-items-center wow fadeIn">
           <div class="col-lg-6 col-sm-6 col-6">
              <div class="side_in">
                 <div class="beans d-flex">
                    <img class="heartBeat" src="/assets/img/beans.png"/>
                    <h3 class="count text-white">{{$contest->bean_pot}}</h3>
                 </div>
              </div>
           </div>
           <div class="col-lg-6 col-sm-6 col-6">
              <div class="home_soical">
                 <a data-toggle="modal" data-target="#gameleave" onclick><img src="/assets/img/home.png"/>
                 </a>
                 <a data-toggle="modal" data-target="#intro" class="pr-0"><img src="/assets/img/i_icon.png"/>
                 </a>
              </div>
           </div>
        </div>
     </div>
     <div class="inner_section">
        <div class="container position-relative">
           <div class="row wow fadeIn">
              <div class="offset-lg-3 offset-sm-0 col-lg-5">
                 <div class="player">
                    @if($card->type == 'action')
                    <h3 class="play_name text-center">{{$playerTurn->name}}<span> IT'S YOUR TURN </span></h3>
                    @endif
                    @if($card->type == 'wild')
                    <h3 class="play_name text-center sec_screen">{{$playerTurn->name}} <span>IT'S YOUR TURN<br> @if($card->sub_type == 'CHALLENGE') CHALLENGING @else PARTNERING WITH @endif</span>{{$playerWith->name}}</h3>
                    @endif
                    @if($card->type == 'big bean')
                    <h3 class="play_name text-center sec_screen">{{$playerTurn->name}}<span> IT’S YOUR TURN PLAYING WITH THE ENTIRE GROUP </span></h3>
                    @endif
                 </div>
                 @if($card->sub_type == 'CHALLENGE')
                 <div class="main_number">
                    <div class="media_number">
                       <h3 class="text-white at-stake">{{$atStake}}</h3>
                    </div>
                    <div class="stake">
                       <h3 class="text-white beans_text">BEANS AT STAKE</h3>
                    </div>
                 </div>
                 @endif
                 <div class="back_img">
                    <div class="{{$card->bg_image}}">
                       <div class="text_explain text-left {{$card->type == 'wild'?'sec_screen_text':''}}">
                          <h3>{{strtoupper($card->content)}}
                          </h3>
                       </div>
                       <button type="button" class="dare {{$card->type == 'wild'?'dare2':''}}  font-weight-bold">{{$card->sub_type}}</button>
                    </div>
                 </div>
                 <a class="next-btn-space" href="javascript:;">
                   @if($card->type == 'action')
                   <button class="btn btn-next-pink" data-toggle="modal" data-target="#winloss" type="button">NEXT</button>
                   @endif
                   @if($card->type == 'wild' )
                     @if($card->sub_type == 'CHALLENGE')
                     <button class="btn btn-next-pink challenge-card" data-toggle="modal" data-target="#wincard" type="button">NEXT</button>
                     @else
                     <button class="btn btn-next-pink" data-toggle="modal" data-target="#winloss" type="button">NEXT</button>
                     @endif
                   @endif
                   @if($card->type == 'big bean')
                   <button class="btn btn-next-pink" data-toggle="modal" data-target="#bigbens" type="button">NEXT</button>
                   @endif
                 </a>
              </div>
              <div class="col-lg-4 col-sm-12 ">
                 <div class="player_list ml-5">
                    <div class="sec_part {{$card->sub_type == 'CHALLENGE'?'':'hidden' }}">
                       <h3 class="text-white number at-stake">{{$atStake}}</h3>
                       <h4 class="text-white m-0 font-weight-bold"><img src="/assets/img/beans__sec.png"> AT STAKE</h4>
                    </div>
                    <div class="d-flex">
                      <div class="all_player">
                        @foreach($contestPlayers as $key => $player)
                        @if($key % 2 == 0)
                            <div class="side_line {{$playerTurn->id == $player->id || (isset($playerWith) && $playerWith->id == $player->id)?'active_player':''}}">
                               <div class="side_line2 ">
                                  @if($player->beans <= 0)
                                  <h4 class="text-white text-center text-danger" >{{$player->beans}}</h4>
                                  @else
                                  <h4 class="text-white text-center">{{$player->beans}}</h4>
                                  @endif
                               </div>
                               <h4 class="text-white player_name">{{$player->name}}</h4>
                            </div>
                         @endif
                        @endforeach
                      </div>
                      <div class="all_player">
                        @foreach($contestPlayers as $key => $player)
                        @if($key % 2 != 0)
                            <!-- <div class="side_line loss_btn">
                               <div class="side_line2 side_loss"> -->
                             <div class="side_line {{$playerTurn->id == $player->id || (isset($playerWith) && $playerWith->id == $player->id)?'active_player':''}}">
                                <div class="side_line2">
                                  @if($player->beans <= 0)
                                  <h4 class="text-white text-center text-danger" >{{$player->beans}}</h4>
                                  @else
                                  <h4 class="text-white text-center">{{$player->beans}}</h4>
                                  @endif
                               </div>
                               <h4 class="text-white player_name">{{$player->name}}</h4>
                            </div>
                         @endif
                         @endforeach
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="main_stand">

              @if($card->character_image)
              <div class="mob_chater">
                 <img src="/assets/img/{{$card->character_image}}">
              </div>
              @endif

           </div>
           <div class="slider">
              <div class="owl-carousel owl-theme mb_slider">
                @foreach($contestPlayers as $player)
                 <div class="item">
                    <div class="check">
                       <div class="mob_btn">
                          <h4 class="text-white player_name">{{$player->name}}</h4>
                       </div>
                       <div class="mob_btn_side">
                          <h4 class="{{$player->is_eliminated?'text-red':'text-white'}} text-center">{{$player->beans}}</h4>
                       </div>
                    </div>
                 </div>
                 @endforeach
              </div>
           </div>
        </div>
     </div>
     @if($card->character_image)
     <div class="character {{($card->character_image == 'louis1.png' || $card->character_image == 'harold.png')?'character_4':($card->character_image == 'knieveljr.png'?'character_3':'')}} wow fadeInLeft">
        <img src="/assets/img/{{$card->character_image}}">
     </div>
     @endif
  </div>
</section>
<style media="screen">
.text-red{
  color: red;
}
.hidden {
  visibility: hidden;
}
</style>
@include('contests.models')
@endsection
