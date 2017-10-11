@extends('template.default')

@section('styles')
<style type="text/css">
	body { 
			 background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{URL::to("image/bg.png")}}');
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;
			font-family: 'Raleway', sans-serif;
 			
	}

	#content {
		margin-top: 15%;
		color: #fff;
	}
	.navbar {
		background: transparent !important;
		color: #fff !important;
		
	}
	i {
		font-size: 40px;
		margin-bottom: 10px;
	}

</style>
@endsection
 @if(!Auth::user())
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                  <a class="navbar-brand" href="{{route('main')}}">E-sumbong</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('main')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        @endif
@section('contents')
	<div id="content">
		<center><i class="glyphicon glyphicon-user"></i></center>
		<h4 class="text-center">Right Action - Better Resolutions</h4>
		<br>
		<p class="text-center">The first Online Complaint Application and exclusively develop for the citizens from</p>
		<p class="text-center">Barangay Tagapo. Insulate your right as you secure your complaints on using</p>
		<p class="text-center">eSumbong Online Complaint Application</p>

		
	</div>
@endsection

@section('scripts')

@endsection