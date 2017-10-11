@extends('template.default')

@section('styles')
<style type="text/css">
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
              <li role="presentation" ><a href="{{route('user_request')}}">Request</a></li>
              <li role="presentation"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation" class="active"><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          <ul class="nav nav-tabs">
            <li role="presentation" ><a href="{{route('user_missing')}}">List</a></li>
            <li role="presentation" class="active"><a href="{{route('user_missing_create')}}">Create</a></li>
          </ul>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="text-center">Report Missing Form</h2>
            </div>
            <div class="panel-body">
              <div class="col-md-6">
                @if(Session::has('err'))
                  <div class="alert alert-danger">{{Session::get('err')}}</div>
                @endif
                <form action="{{route('user_missing_check')}}" method="POST" enctype="multipart/form-data">
                  <div class="form-group {{$errors->has('fname') ? 'has-error': ''}}">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" required="">
                  </div>
                   <div class="form-group {{$errors->has('lname') ? 'has-error': ''}}">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" required="">
                  </div>
                  <div class="form-group {{$errors->has('gender') ? 'has-error': ''}}">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                      <option>Male</option>
                      <option>Female</option>
                      <option>LGBT</option>
                    </select>
                  </div>
                  <div class="form-group {{$errors->has('age') ? 'has-error': ''}}">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" min="1" required="">
                  </div>
                   <div class="form-group {{$errors->has('description') ? 'has-error': ''}}">
                    <label>Description</label>
                    <textarea name="description" class="form-control" required=""></textarea>
                  </div>
                   <div class="form-group {{$errors->has('image') ? 'has-error': ''}}">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required="">
                  </div>
                   <div class="form-group {{$errors->has('date') ? 'has-error': ''}}">
                    <label>Date Missing</label>
                    <input type="date" name="date" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    {{csrf_field()}}
                  </div>
                </form>
              </div>
            </div>
          </div>
       </div>
   </div>
@endsection

@section('scripts')


@endsection