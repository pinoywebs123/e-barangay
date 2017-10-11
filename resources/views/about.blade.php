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
	#about{
		color: #fff;
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
                    <li ><a href="{{route('main')}}">Home</a></li>
                    <li class="active"><a href="{{route('about')}}">About</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        @endif
@section('contents')
	<div id="about">
		<h1 class="text-center">WELCOME TO THE BARANGAY TAGAPO</h1>
		<h2 class="text-center">CITY OF SANTA ROSA</h2>

		<article>&nbsp;&nbsp;&nbsp;
			The City is continually making effort to ensure that people have access to our services and information. May this website be an empowering tool in availing our programs and services. May this, along with our social networking accounts, enable you to participate on how to improve our performance through sending feedbacks and suggestions.
		</article>
		<br>
		<article>&nbsp;&nbsp;&nbsp;
			It is our desire that this serve as venue in helping us achieve our goal for the people of this City as encapsulated in our slogan "SebisyongMakatao, LungsodnaMakabago."
		</article>

		<br>
		<article>&nbsp;&nbsp;&nbsp;
			Santa Rosa is a world class, smart and green city with a sustained and inclusive economic growth. City of Santa Rosa is politically subdivided into 18 Barangays where Barangay Tagapois also included. Barangay Tagapo has almost 26,000 population.
		</article>

		<div id="officials">
			<h3 class="text-center">Barangay Tagapo</h3>
			<p class="text-center"><strong>Punong Barangay</strong></p>
			<p class="text-center">Hon. Aldrin T. Lumague</p>
			<p class="text-center"><strong>Barangay Kagawad</strong></p>
			<p class="text-center">Hon. Marvin B. Ambas</p>
			<p class="text-center">Hon. Rolando A. Bato</p>
			<p class="text-center">Hon. Nicanor H. Delos Reyes</p>
			<p class="text-center">Hon. Leonardo M. Lianza</p>
			<p class="text-center">Hon. Manuel G. Alon</p>
			<p class="text-center">Hon. Pepito D. Tatlonghari</p>
			<p class="text-center">Hon. Josefino M. Adato</p>
			<p class="text-center"><strong>Barangay Secretary</strong></p>
			<p class="text-center">Mr.Ramoon S. Villanueva</p>
			<p class="text-center"><strong>Barangay Treasurer</strong></p>
			<p class="text-center">Mr Jaime G. Escueta</p>
		</div>
	</div>
@endsection

@section('scripts')

@endsection