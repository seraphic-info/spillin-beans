@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Cards</h4>

            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">
                    <a href="/admin/cards/create" class="btn btn-danger text-white"
                        >Add New Card</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  @if (\Session::has('success'))
                  <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ \Session::get('success') }}</strong>
                  </div>
                  @endif
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Category</th>
                                    <th class="border-top-0">Sub Category</th>
                                    <th class="border-top-0">Character</th>
                                    <th class="border-top-0">Content</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($cards as $card)
                                <tr>
                                    <td>{{$card->id}}</td>
                                    <td>{{ucfirst($card->type)}}</td>
                                    <td>{{$card->sub_type}}</td>
                                    <td>
                                      @if($card->character_image)
                                      <img style="width: 50px;"src="/assets/img/{{$card->character_image}}">
                                      @endif
                                    </td>
                                    <td>{{$card->content}}</td>
                                    <td>
                                      <a href="/admin/cards/{{$card->id}}/edit"><button class="label label-info">Edit </button></a>
                                      <a href="/admin/cards/{{$card->id}}/delete"><button class="label label-danger">Delete </button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$cards->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
