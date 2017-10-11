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
              <li role="presentation" ><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation" ><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation" class="active"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
        @if(Session::has('info'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('info')}}
                </div>
              @endif
        <div class="col-md-7">
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="text-center">User Profile</h3>
             </div>
             <div class="panel-body">
              <center><img src="{{URL::to('profile/'.Auth::user()->image)}}" alt="profile image" width="80px" class="img-thumbnail"></center>
               <ul class="list-group">
                <li class="list-group-item">Name: {{Auth::user()->fname}} {{Auth::user()->lname}}</li>
                <li class="list-group-item">Gender: {{Auth::user()->gender}}</li>
                <li class="list-group-item">Civil Status: {{Auth::user()->civil_status}}</li>
                <li class="list-group-item"></li>
              </ul>

               <ul class="list-group">
                <li class="list-group-item">Complete Address: {{Auth::user()->address}}</li>
              </ul>

               <ul class="list-group">
                <li class="list-group-item">Birthdate: {{Auth::user()->dob}}</li>
                
              </ul>

              <ul class="list-group">
                <li class="list-group-item">Contact: {{Auth::user()->contact}}</li>
                <li class="list-group-item">Email Address: {{Auth::user()->email}}</li>
              </ul>

             </div>
           </div>
        </div>

        <div class="col-md-5">
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="text-center">Update Profile</h3>

             </div>
             <div class="panel-body">
             <center><img src="{{URL::to('profile/'.Auth::user()->image)}}" alt="profile image" width="80px" class="img-thumbnail"></center>
               <form action="{{route('user_update_profile')}}" method="POST">
                 <div class="form-group">
                   <label>Civil Status</label>
                   <select name="status" class="form-control">
                     <option value="Single">Single</option>
                     <option value="Married">Married</option>
                     <option value="Widow">Widow</option>
                   </select>
                 </div>
                  <div class="form-group">
                   <label>Address</label>
                   <textarea name="address" class="form-control" required="" >{{Auth::user()->address}}</textarea>
                 </div>
                  <div class="form-group">
                   <label>Contact</label>
                   <input type="number" name="contact" class="form-control" required="" value="{{Auth::user()->contact}}" min="0">
                 </div>
                  <div class="form-group">
                   <label>Email</label>
                   <input type="email" name="email" class="form-control" required="" value="{{Auth::user()->email}}">
                 </div>
                 <button class="btn btn-info btn-block" type="submit">UPDATE NOW</button>
                 {{csrf_field()}}
               </form>
             </div>
           </div>
        </div>
       </div>
   </div>
@endsection

@section('scripts')

<script type="text/javascript">
   
</script>
@endsection