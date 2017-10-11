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
              <li role="presentation" ><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" class="active"><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          @if(Session::has('change'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('change')}}
                </div>
              @endif
          @if(Session::has('no_change'))
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>OOppss!</strong> {{Session::get('no_change')}}
                </div>
              @endif    


         <form action="{{route('user_settings_check')}}" method="POST" class="col-md-6 col-md-offset-3">
           <div class="form-group {{$errors->has('new_password') ? 'has-error' : ''}}">
             <label>New Password</label>
             <input type="password" name="new_password" class="form-control" required="">
             @if($errors->has('new_password'))
              <i class="help-block">{{$errors->first('new_password')}}</i>
             @endif
           </div>
           <div class="form-group {{$errors->has('re_type_password') ? 'has-error' : ''}}">
             <label>Re-type Password</label>
             <input type="password" name="re_type_password" class="form-control" required="">
              @if($errors->has('re_type_password'))
              <i class="help-block">{{$errors->first('re_type_password')}}</i>
             @endif
           </div>
           <button class="btn btn-primary" type="submit">UPDATE</button>
           {{csrf_field()}}
         </form>
       </div>
    </div>
       
@endsection

@section('scripts')

<script type="text/javascript">
   
</script>
@endsection