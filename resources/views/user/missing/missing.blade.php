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
            <li role="presentation" class="active"><a href="{{route('user_missing')}}">List</a></li>
            <li role="presentation"><a href="{{route('user_missing_create')}}">Create</a></li>
            
          </ul>
          @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('success')}}
                </div>
              @endif

             <div class="row">
                <h3 class="text-center">List of Report Missing</h3>
                @foreach($gets as $morls)
                 <div class="row">
                   <div class="col-md-4">
                    
                     <ul class="list-group">
                     <li class="list-group-item"><strong>Reporter Info</strong></li>
                      <li class="list-group-item">Name: {{$morls->user->fname}} {{$morls->user->lname}}</li>
                      <li class="list-group-item">Contact: {{$morls->user->contact}}</li>
                      <li class="list-group-item">Email: {{$morls->user->email}}</li>
                      <li class="list-group-item">Address: {{$morls->user->address}}</li>
                      <li class="list-group-item">Date Posted: {{$morls->created_at->toDayDateTimeString()}}</li>
                    </ul>
                   </div>
                   <div class="col-md-4">
                     <ul class="list-group">
                     <li class="list-group-item"><strong>Missing: @if($morls->status_id == 3)
<button class="btn btn-danger btn-xs">Pending</button>
@elseif($morls->status_id == 4)
<button class="btn btn-success btn-xs">Approved</button>
@elseif($morls->status_id == 6)
<button class="btn btn-info btn-xs">Found</button>
@endif</strong></li>
                      <li class="list-group-item">Name: {{$morls->missing->fname}} {{$morls->missing->lname}}</li>
                      <li class="list-group-item">Gender: {{$morls->missing->gender}}</li>
                      <li class="list-group-item">Age: {{$morls->missing->age}}</li>
                      <li class="list-group-item">Date Missing: {{$morls->missing->date_missing}}</li>
                      <li class="list-group-item">Description: {{$morls->missing->description}}</li>
                    </ul>
                   </div>
                   <div class="col-md-4">
                     <img src="{{URL::to('missing/'.$morls->missing->image)}}" width="250px" height="250px">
                   </div>
                 </div>
                @endforeach
             
             {{$gets->links()}}
            </div>
       </div>
   </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        
    });
</script>
@endsection