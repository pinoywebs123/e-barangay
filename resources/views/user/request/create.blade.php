<?php
date_default_timezone_set('Asia/Manila');
?>
@extends('template.default')

@section('styles')
<style type="text/css">
  #two, #three, #four, #five{
    display: none;
  }
  .jumbotron{
    margin-bottom: 0px;
  }
   #heads{
    margin-top: -40px;
    color: #fff;
  }
  img{
    z-index: -9999;
  }
   body {
    background: #2c3e50;
  }
</style>
@endsection

@section('contents')
    <div id="aw">
       <img src="{{URL::to('image/test.jpg')}}" width="100%" height="320px">
       <h2 class="text-center" id="heads">Barangay Tagapo E-Sumbong</h2>
   </div>
   <div>
       <div class="col-md-3 well">
           <ul class="nav nav-pills nav-stacked">
              <li role="presentation" ><a href="{{route('user_main')}}">Home</a></li>
              <li role="presentation" class="active"><a href="{{route('user_request')}}">Request</a></li>
              <li role="presentation"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation"><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          <ul class="nav nav-tabs">
            <li role="presentation" ><a href="{{route('user_request')}}">List</a></li>
            <li role="presentation" class="active"><a href="{{route('user_request_create')}}">Create</a></li>
          </ul>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="text-center">Send New Request</h2>
            </div>
            <div class="panel-body">
               <div class="col-md-5">
                   
                    <div class="form-group">
                      <label>Choose Transaction</label>
                      <select class="form-control" id="transact" name="certificate">
                       @foreach($certificates as $certificate)
                        <option value="{{$certificate->id}}">{{$certificate->request_name}}</option>
                       @endforeach
                      </select>
                    </div>
                    
                   
                 
               </div>
               <div class="col-md-7">
                 <div id="one">
                   <h1>Business Clearance Form</h1>
                   <form action="{{route('user_request_create_check', ['request_id'=> 1])}}" method="POST">
                     <div class="form-group {{$errors->has('b_name') ? 'has-error': ''}}">
                       <label>Business Name</label>
                       <input type="text" name="b_name" class="form-control" required="">
                       @if($errors->has('b_name'))
                        <i class="help-block">{{$errors->first('b_name')}}</i>
                       @endif
                     </div>
                     <div class="form-group {{$errors->has('b_address') ? 'has-error': ''}}">
                       <label>Business Address</label>
                       <input type="text" name="b_address" class="form-control" required="">
                       @if($errors->has('b_name'))
                        <i class="help-block">{{$errors->first('b_address')}}</i>
                       @endif
                     </div>

                     <div class="form-group ">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="New">New</option>
                          <option value="Renewal">Renewal</option>
                        </select>
                      </div>

                       <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">SEND REQUEST</button>
                        </div>
                        {{csrf_field()}}
                   </form>
                   
                 </div>

                  <div id="two">
                   <h1>Construction Permit Form</h1>
                   <form action="{{route('user_request_construction_permit', ['request_id'=> 2])}}" method="POST">
                     <div class="form-group {{$errors->has('b_type') ? 'has-error': ''}}">
                       <label>Business Type: </label>
                       <input type="text" name="b_type" class="form-control" required="">
                        @if($errors->has('b_type'))
                        <i class="help-block">{{$errors->first('b_type')}}</i>
                       @endif
                     </div>
                     <div class="form-group {{$errors->has('b_address') ? 'has-error': ''}}">
                       <label>Address:</label>
                       <input type="text" name="b_address" class="form-control" required="">
                        @if($errors->has('b_address'))
                        <i class="help-block">{{$errors->first('b_address')}}</i>
                       @endif
                     </div>
                     <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">SEND REQUEST</button>
                       {{csrf_field()}}
                     </div>
                   </form>
                 </div>

                  <div id="three">
                   <h1>Business Closure</h1>
                   <form action="{{route('user_request_business_closure', ['request_id'=> 3])}}" method="POST">
                     <div class="form-group {{$errors->has('b_name') ? 'has-error': ''}}">
                       <label>Business Name:</label>
                       <input type="text" name="b_name" class="form-control" required="">
                        @if($errors->has('b_name'))
                        <i class="help-block">{{$errors->first('b_name')}}</i>
                       @endif
                     </div>
                     <div class="form-group {{$errors->has('b_address') ? 'has-error': ''}}">
                       <label>Business Address:</label>
                       <input type="text" name="b_address" class="form-control" required="">
                        @if($errors->has('b_address'))
                        <i class="help-block">{{$errors->first('b_address')}}</i>
                       @endif
                     </div>
                     <div class="form-group {{$errors->has('b_own') ? 'has-error': ''}}">
                       <label>Owned by</label>
                       <input type="text" name="b_own" class="form-control" required="">
                        @if($errors->has('b_own'))
                        <i class="help-block">{{$errors->first('b_own')}}</i>
                       @endif
                     </div>
                     <div class="form-group {{$errors->has('b_date') ? 'has-error': ''}}">
                       <label>Stop Operation Since:</label>
                       <input type="date" name="b_date" class="form-control" required="">
                        @if($errors->has('b_date'))
                        <i class="help-block">{{$errors->first('b_date')}}</i>
                       @endif
                     </div>
                     <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">SEND REQUEST</button>
                       {{csrf_field()}}
                     </div>
                   </form>
                 </div>

                  <div id="four">
                   <h1>No Need to Fill-up</h1>
                   <form action="{{route('user_request_good_moral', ['request_id'=> 4])}}" method="POST">
                     <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">SEND REQUEST</button>
                       {{csrf_field()}}
                     </div>
                   </form>
                 </div>

                  <div id="five">
                   <h1>Cerificate of Indingency</h1>
                   <form action="{{route('user_request_indingency', ['request_id'=> 5])}}" method="POST">
                     <div class="form-group {{$errors->has('b_purpose') ? 'has-error': ''}}">
                       <label>Purpose:</label>
                       <textarea name="b_purpose" class="form-control" required=""></textarea>
                       @if($errors->has('b_purpose'))
                        <i class="help-block">{{$errors->first('b_purpose')}}</i>
                       @endif
                     </div>
                     <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">SEND REQUEST</button>
                       {{csrf_field()}}
                     </div>
                   </form>
                 </div>
               </div>
            </div>
          </div>
       </div>
   </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $("#transact").change(function(){
          var aw = $("#transact").val();
          if(aw == 2){
            $("#two").fadeIn(1000);
            $("#one").hide();
            $("#three").hide();
            $("#four").hide();
            $("#five").hide();
          }else if(aw == 3){
            $("#three").fadeIn(1000);
            $("#one").hide();
            $("#two").hide();
            $("#four").hide();
            $("#five").hide();
          }else if(aw == 4){
            $("#four").fadeIn(1000);
            $("#one").hide();
            $("#two").hide();
            $("#three").hide();
            $("#five").hide();
          }else if( aw == 5){
            $("#five").fadeIn(1000);
            $("#one").hide();
            $("#two").hide();
            $("#three").hide();
            $("#four").hide();
          }else if(aw == 1){
            $("#one").fadeIn(1000);
            $("#five").hide();
            $("#two").hide();
            $("#three").hide();
            $("#four").hide();
          }
        });
    });
</script>
@endsection