@extends('layouts.start')
@section('content')
<section class="start-wrapper">
   <div class="container">
     <div class="row">
        <div class="col-lg-6 m-auto text-center wow fadeIn">
           <div class="hanging-wooden">
              <a href="/">
                <img src="/assets/img/wooden.png" alt="">
              </a>
           </div>
           <div class="start-card-wrapper">
              <a class="card-close-icon enter-name-cross" href="/"><img src="/assets/img/cross.png" alt=""></a>
              <div class="login-form">
                 <form action="/contests/store" method="post">
                   @csrf
                    <div class="form-group">
                       <input type="text" class="form-control" placeholder="Name" name="name" required value="{{old('name')}}">
                       <span class="error" style="color: red;">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                       <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                       <span class="error" style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                    <a class="next-btn-space" href="javascript:;"> <button class="btn btn-next-pink" type="submit">Next</button></a>
                 </form>
              </div>
           </div>
        </div>
        <div class="char-wrappers">
           <ul>
              <li class="wow fadeInLeft">
                 <img src="/assets/img/knievel.png" alt="">
                 <div class="char-chat-bubble char-chat-bubble-big char-chat-bubble-left">
                    <p>I can assure you our time together would be a hell of a ride </p>
                 </div>
              </li>
              <li class="wow fadeInRight">
                 <img src="/assets/img/hippie.png" alt="">
                 <div class="char-chat-bubble char-chat-bubble-right">
                    <p>My motto is chick, peace and love. So yes I like hummus.</p>
                 </div>
              </li>
           </ul>
        </div>
     </div>
   </div>
</section>
@endsection
