<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Esumbong Dashboard</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  

<style type="text/css">
    #txt{
        font-size: 48px;
    }
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">Esumbong</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                         <li>
                            <a href="{{route('admin_profile')}}"><i class="fa fa-fw fa-gear"></i> Profile</a>
                        </li>
                         <li>
                            <a href="{{route('admin_setting')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin_logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                	
                    <li>
                      <a href="{{route('admin_home')}}" ><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                     <li>
                    	<a href="{{route('admin_main')}}"><i class="glyphicon glyphicon-volume-up"></i> Announcement</a>
                    </li>
                     <li class="active">
                        <a href="{{route('admin_request')}}"><i class="glyphicon glyphicon-folder-open"></i> Request</a>
                    </li>
                    <li>
                        <a href="{{route('admin_blotter')}}"><i class="glyphicon glyphicon-file"></i> Blotter</a>
                    </li>
                     <li>
                        <a href="{{route('admin_patawag')}}"><i class="glyphicon glyphicon-volume-up"></i> Patawag</a>
                    </li>
                   	<li>
                        <a href="{{route('admin_missing')}}"><i class="glyphicon glyphicon-picture"></i> Missing</a>
                    </li>
                    <li>
                    	<a href="{{route('admin_user_list')}}"><i class="glyphicon glyphicon-user"></i> USERS</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="{{route('admin_request')}}">Business Clerance</a></li>
                  <li role="presentation" ><a href="{{route('admin_request_contruction_permit')}}">Construction Permit</a></li>
                  <li role="presentation"><a href="{{route('admin_request_business_closure')}}">Business Closure</a></li>
                  <li role="presentation" ><a href="{{route('admin_request_good_moral')}}">Good Moral</a></li>
                  <li role="presentation" class="active"><a href="{{route('admin_request_indingency')}}">Certificate of Indingency</a></li>
                </ul>


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="text-center">Certificate of Indingency</h3>
                    </div>
                    <div class="panel-body">
                         @if(Session::has('info'))
                          <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Yehey!</strong> {{Session::get('info')}}
                          </div>
                        @endif
                        <table class="table">
                           
                                @if($gets->count() > 0)
                                     <thead>
                                        <tr>
                                            <td>First Name</td>
                                            <td>Middle Name</td>
                                            <td>Last Name</td>
                                            <td>Date</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gets as $isa)
                                        <tr>
                                            <td>{{$isa->user->fname}}</td>
                                            <td>{{$isa->user->mname}}</td>
                                            <td>{{$isa->user->lname}}</td>
                                            <td>{{$isa->created_at->toDayDateTimeString()}}</td>
                                            <td>
                                                @if($isa->status_id == 3)
                                                    <button type="button" class="btn btn-danger btn-xs">Pending</button>
                                                @elseif($isa->status_id == 4)
                                                    <button type="button" class="btn btn-success btn-xs">Approved</button>
                                                @endif
                                                <button class="btn btn-warning btn-xs">{{$isa->payment_status}}</button>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{URL::to('barangay/'.$isa->path.'.pdf')}}" class="btn btn-info btn-xs">View</a>
                                                <a href="{{route('admin_request_decline', ['id'=> $isa->id])}}" class="btn btn-danger btn-xs">Decline</a>
                                                <a href="{{route('admin_request_approve', ['id'=> $isa->id])}}" class="btn btn-success btn-xs">Approve</a>
                                                <a href="{{route('admin_request_paid', ['id'=> $isa->id])}}" class="btn btn-warning btn-xs">Paid</a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <h2 class="text-center">No Records</h2>
                                @endif
                            </tbody>
                        </table>
                         <center>{{$gets->links()}}</center>
                    </div>
                </div>
                
               

            </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
