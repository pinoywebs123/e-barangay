@extends('template.default')

@section('styles')
<style type="text/css">
	.well{
		background: transparent;
		margin-top: 10%;
		border-radius: 20px;
	}
	body { 
			 background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('{{URL::to("image/bg.png")}}');
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;
			font-family: 'Raleway', sans-serif;
			color: #fff;
 			
	}
	#logo{
		margin-top: -50px;
	}
	.navbar {
		background: transparent !important;
		color: #fff !important;
		
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
                    <li><a href="{{route('main')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        @endif
@section('contents')
	<div class="col-md-6 col-md-offset-3 well">
		<p class="text-center" id="logo"><img src="{{URL::to('image/logo.png')}}" width="100px">
		</p>
		@if(Session::has('error'))
			<div class="alert alert-danger">
				<p class="text-center"><strong>{{Session::get('error')}}!!!</strong></p>
			</div>
		@endif
		<form action="{{route('login_check')}}" method="POST">
			<div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
				<label for="email">Enter Username</label>
				<input type="text" name="username" id="email" class="form-control">
				@if($errors->has('email'))
					<span class="help-block">{{$errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
				@if($errors->has('password'))
					<span class="help-block">{{$errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="remember">Remember</label>
				<input type="checkbox" name="remember" id="remember">
			</div>
			<button type="submit" class="btn btn-default">Sign-In</button>
			{{csrf_field()}}
		</form>
	</div>
@endsection

@section('scripts')

@endsection