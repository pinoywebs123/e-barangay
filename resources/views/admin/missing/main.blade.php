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
    .navbar {
     background: #2c3e50 !important;
   }
   #sides ul {
    background: #2c3e50 !important;
   }
   body {
    background: #2c3e50;
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account<b class="caret"></b></a>
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
                    
                     <li >
                    	<a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-volume-up"></i> Announcement</a>
                    </li>
                     <li>
                        <a href="{{route('admin_request')}}"><i class="glyphicon glyphicon-folder-open"></i> Request</a>
                    </li>
                    <li>
                        <a href="{{route('admin_blotter')}}"><i class="glyphicon glyphicon-file"></i> Blotter</a>
                    </li>
                     <li>
                        <a href="{{route('admin_patawag')}}"><i class="glyphicon glyphicon-volume-up"></i> Patawag</a>
                    </li>
                   	<li class="active">
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
                  <li role="presentation" class="active"><a href="{{route('admin_missing')}}">List</a>
                  <li role="presentation" ><a href="{{route('admin_missing_create')}}">Create</a>
                   <li role="presentation" "><a href="{{route('admin_missing_found')}}">Found</a> 
                  </li>
                 
                </ul>
            </div>
            @if(Session::has('info'))
                  <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Yehey!</strong> {{Session::get('info')}}
                  </div>
                @endif
            <table class="table">
                <thead>
                    <tr>
                       
                        <th>Sender</th>
                        <td>Missing</td>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach($gets as $morls)
                        <tr>
                          
                            <td>{{$morls->user->fname}} {{$morls->user->lname}}</td>
                            <td>{{$morls->missing->fname}} {{$morls->missing->lname}}</td>
                            <td>{{$morls->missing->created_at->toDayDateTimeString()}} </td>
                            <td>
                                @if($morls->status_id == 3)
                                    <button class="btn btn-danger btn-xs">Pending</button>
                                @elseif($morls->status_id == 4)
                                    <button class="btn btn-success btn-xs">Approved</button>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('admin_missing_decline', ['id'=> $morls->id])}}" class="btn btn-danger btn-xs">Decline</a>
                                <a href="{{route('admin_missing_approve', ['id'=> $morls->id])}}" class="btn btn-success btn-xs">Approve</a>
                                <a href="{{route('admin_missing_found_check', ['id'=> $morls->id])}}" class="btn btn-info btn-xs">Found</a>
                                <a href="{{route('admin_missing_view', ['id'=> $morls->id])}}" class="btn btn-primary btn-xs">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>  
            </table>
            <center>{{$gets->links()}}</center>
        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
