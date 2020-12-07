@extends('layouts.start')
@section('content')
<section class="start-wrapper">
   <div class="container">
     <div class="row">
        <div class="col-lg-6 m-auto text-center wow  fadeIn">
           <div class="hanging-wooden">
              <img src="/assets/img/wooden.png" alt="">
           </div>
           <div class="start-card-wrapper">
              <ul>
                 <li>
                    <a href="/contests/create"> <button class="btn btn-pink-bg" type="button">PLAY</button></a>
                 </li>
                 <li>
                    <a href="javascript:;"> <button class="btn btn-pink-bg" data-toggle="modal" data-target="#intro" type="button">INSTRUCTIONS</button></a>
                 </li>
                 <li>
                    <a href="http://www.spillinbeans.com/"> <button class="btn btn-pink-bg" type="button">NAVIGATE TO WEBSITE</button></a>
                 </li>
              </ul>
           </div>
        </div>
        <div class="char-wrappers">
           <ul>
              <li class="wow fadeInLeft">
                 <img src="/assets/img/louis.png" alt="">
                 <div class="char-chat-bubble char-chat-bubble-left">
                    <p>Want to play Spillin’ Beans?</p>
                 </div>
              </li>
              <li class="wow fadeInRight">
                 <img src="/assets/img/pamela.png" alt="">
                 <div class="char-chat-bubble char-chat-bubble-right">
                    <p>I bet you a round of bean & tonic I’ll beat you!</p>
                 </div>
              </li>
           </ul>
        </div>
     </div>
   </div>
</section>
@include('instructions')

@endsection
