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
              <li role="presentation" class="active"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation" ><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="{{route('user_blotter')}}">List</a></li>
            <li role="presentation"><a href="{{route('user_blotter_create')}}">Create</a></li>
          </ul>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('success')}}
                </div>
              @endif

              @if(Session::has('delete'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('delete')}}
                </div>
              @endif

              <div class="panel panel-primary">
                <div class="panel-heading">
                 <h2 class="text-center">List of Report Blotter</h2>
                </div>
                <div class="panel-body">
                   @if($myblot->count() > 0)
                  <table class="table">
                    <thead>
                       <tr>
                         <th>Entry ID</th>
                         <th>Incident Type</th>
                         <th>Status</th>
                         <th>Date</th>
                        
                       </tr> 
                    </thead>

                    <tbody>
                       
                          @foreach($myblot as $blot)
                            <tr>
                              <td>{{$blot->entry_number}}</td>
                              <td>{{$blot->incident_name}}</td>
                              <td>
                                @if($blot->status_id == 3)
                                    <button class="btn btn-danger btn-xs" disabled="">pending</button>
                                @else
                                    <button class="btn btn-success btn-xs" disabled="">approved</button>
                                @endif
                              </td>
                              <td>{{$blot->created_at->toDayDateTimeString()}}</td>
                            </tr>
                          @endforeach
                       
                          
                    </tbody>

                     @else
                      <h2 class="text-center">No Request Yet</h2>
                     @endif
                  </table>
                  <center>{{$myblot->links()}}</center>
                </div>
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