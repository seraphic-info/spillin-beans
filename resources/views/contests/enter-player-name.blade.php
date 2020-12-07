@extends('layouts.start')
@section('content')
<section class="start-wrapper vertical-center">
    <div class="container">
      <div class="row">
         <div class="col-lg-6 m-auto text-center wow  fadeIn">
            <div class="start-card-wrapper-big bg_player">
               <a class="red-card-close-icon" href="/"><img src="/assets/img/red-cross.png" alt=""></a>
               <div class="name-plate-card">
                  <h6>ENTER PLAYERS</h6>
               </div>
               <div class="login-form">
                  <form class="w-100" action="/contests/players/store" method="post">
                    @csrf
                    <span class="error" style="color: red;">{{ $errors->first('min_players') }}</span>

                     <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="hidden" name="contest_id" value="{{$contest->id}}">
                              <input type="text" class="form-control" placeholder="Name" name="players[1][name]" value="{{old('players.1.name')? old('players.1.name'):$contest->name}}" >
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[2][name]" value="{{old('players.2.name')}}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[3][name]" value="{{old('players.3.name')}}">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[4][name]" value="{{old('players.4.name')}}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[5][name]" value="{{old('players.5.name')}}">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[6][name]" value="{{old('players.6.name')}}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[7][name]" value="{{old('players.7.name')}}">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[8][name]" value="{{old('players.8.name')}}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[9][name]" value="{{old('players.9.name')}}">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name" name="players[10][name]" value="{{old('players.10.name')}}">
                           </div>
                        </div>
                     </div>
                     <a class="next-btn-space" href="javascript:;"> <button class="btn btn-horizontal-large" type="submit">LET’S SPILL SOME BEANS</button></a>
                  </form>
               </div>
            </div>
         </div>
         <div class="char-wrappers char-single-right single_c hide_c">
            <ul>
               <li>
               </li>
               <li class="wow fadeInRight">
                  <img src="/assets/img/hippie.png" alt="">
               </li>
            </ul>
         </div>
      </div>
    </div>
</section>
@endsection
