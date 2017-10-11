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
              <li role="presentation" class="active"><a href="{{route('user_request')}}">Request</a></li>
              <li role="presentation"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation"><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation"><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="{{route('user_request')}}">List</a></li>
            <li role="presentation"><a href="{{route('user_request_create')}}">Create</a></li>
          </ul>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="text-center">List of Request</h2>
            </div>
            <div class="panel-body">
              @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Yehey!</strong> {{Session::get('success')}}
                </div>
              @endif
           
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Request</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($madami->count() > 0)
                    @foreach($madami as $kunti)
                      <tr>
                        <td>{{$kunti->user->fname}} {{$kunti->user->lname}}</td>
                     
                        <td>{{$kunti->request->request_name}}</td>
                        <td>{{$kunti->created_at->toDayDateTimeString()}}</td>
                        <td>
                          @if($kunti->status_id == 3)
                            <button type="button" class="btn btn-danger btn-xs">Pending</button>
                          @elseif($kunti->status_id == 4)
                            <button type="button" class="btn btn-success btn-xs">Approved</button>
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-info btn-xs">{{$kunti->payment_status}}</button>
                        </td>

                        <td>
                          <button type="button" class="btn btn-warning btn-xs requirementBtn" value="{{$kunti->request_certificate_id}}" >Requirements</button>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <h2 class="text-center">No Record</h2>
                  @endif
                </tbody>
              </table>
              <center>{{$madami->links()}}</center>
            </div>
          </div>
       </div>
   </div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Requirements</h4>
        </div>
        <div class="modal-body">
          <p id="atay"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $(".requirementBtn").click(function(){
         var awo = $(this).attr("value");
         if(awo == 1){
          $("#atay").html("<p>For single proprietorship:</p> <p>1. Please bring picture of your store (ex. Sari-sari Store)</p> <p>For corporation:</p> <p>1. Please bring DTI Permit and Amendment with SEC Certificate</p>");
         }else if(awo == 2){
          $("#atay").html("<p>Construction Permit Requirements:</p> <p>1. Proof of ownership</p> <p>2. Layout Plan for Construction</p> <p>3. Mayor’s Permit</p>");
         }else if(awo == 3){
          $("#atay").html("<p>For single proprietorship:</p> <p>1.  Board resolution with signature</p> <p>For corporation:</p> <p>2. Termination Form</p> <p>Note: Please bring your business plate and Barangay Clearance</p>");
         }
         else if(awo == 4){
          $("#atay").html("<p>Good Moral Requirements:</p> <p>1.  Please bring any 1 valid ID</p>");
         }else if(awo == 5){
          $("#atay").html("<p>Certificate of Indigency Requirements:</p> <p>1.  Please bring  any 1 valid ID</p>");
         }


          $("#myModal").modal();
        });
    });
</script>
@endsection