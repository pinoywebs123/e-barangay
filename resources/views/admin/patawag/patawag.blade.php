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
   span {
      font-size: 40px;
    }
    .pull-left{
      margin-right: 50px;
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
                    
                     <li>
                    	<a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-volume-up"></i> Announcement</a>
                    </li>
                     <li>
                        <a href="{{route('admin_request')}}"><i class="glyphicon glyphicon-folder-open"></i> Request</a>
                    </li>
                    <li >
                        <a href="{{route('admin_blotter')}}"><i class="glyphicon glyphicon-file"></i> Blotter</a>
                    </li>
                     <li class="active">
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
                  <li role="presentation" class="active"><a href="{{route('admin_blotter')}}">List</a>
                </ul>
            </div>
            <div class="col-md-3">
                  <div class="panel panel-danger">
                    <div class="panel-heading">
                      <p class="pull-left"><span class="glyphicon glyphicon-file"></span></p>
                      <h1>{{$pats}}</h1>
                      <h2>Patawag</h2>
                    </div>
                    <div class="panel-body">
                      <h3>Pending : {{$pen}}</h3>
                      <h3>Approved : {{$app}}</h3>
                     
                    </div>
                  </div>
                </div>
             @if(Session::has('success'))
                    <div class="alert alert-success">
                      <p class="text-center"><strong>{{Session::get('success')}}!!!</strong></p>
                    </div>
                  @endif
              @if(Session::has('del'))
                    <div class="alert alert-danger">
                      <p class="text-center"><strong>{{Session::get('del')}}!!!</strong></p>
                    </div>
                  @endif     
            <table class="table">
                <thead>
                    <tr>
                        <th>Reporting Person Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>


                <tbody>
                   @foreach($patawag as $pat)
                        <tr>
                            <td>{{$pat->blotter->user->fname}} {{$pat->blotter->user->lname}}</td>
                            <td>{{$pat->created_at->toDayDateTimeString()}}</td>
                            <td>
                                @if($pat->status_id == 3)
                                    <button class="btn btn-danger btn-xs" disabled="">pending</button>
                                @else
                                    <button class="btn btn-success btn-xs" disabled="">approved</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin_decline', ['id'=> $pat->id])}}" class="btn btn-danger btn-xs">Decline</a>
                                <a href="{{route('admin_approve', ['id'=> $pat->id])}}" class="btn btn-success btn-xs">Approve</a>
                                <a target="_blank" href="{{URL::to('patawag/'.$pat->path)}}.pdf" class="btn btn-info btn-xs">View</a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
           
            <tbody>
                
            </tbody>

             </table>
        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
