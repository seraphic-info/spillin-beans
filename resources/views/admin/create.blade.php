@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Add New Card</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/cards">Cards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="/admin/cards/store">
                      @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Select Category</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="type">
                                    <option value="" readonly>--Select--</option>
                                    <option value="action">Action</option>
                                    <option value="wild">Wild</option>
                                    <option value="big bean">Big Beans</option>
                                </select>
                                <span class="error">{{ $errors->first('type') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Sub Category</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="sub_type">
                                    <option value="" readonly>--Select--</option>
                                    <option class="action">DARE</option>
                                    <option class="action">TRUTH</option>
                                    <option class="wild">WOULD YOU RATHER?</option>
                                    <option class="wild">WHO IS MOST LIKELY</option>
                                    <option class="wild">CHALLENGE</option>
                                    <option class="big-bean">BIG BEAN</option>
                                    <option class="big-bean">RAPID FIRE TRIVIA</option>
                                </select>
                                <span class="error">{{ $errors->first('sub_type') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Character</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="character_image">
                                    <option value="" readonly>--Select--</option>
                                    <option value="pamela1.png">Pamela</option>
                                    <option value="harold.png">Harold</option>
                                    <option value="knieveljr.png">Knievel</option>
                                    <option value="louis1.png">Louis</option>
                                </select>
                                <span class="error">{{ $errors->first('character_image') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Message</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line" name="content"></textarea>
                                  <span class="error">{{ $errors->first('content') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<style media="screen">
  .error {
    color: red;
  }
  .action, .wild, .big-bean {
    display: none;
  }
</style>

@endsection
