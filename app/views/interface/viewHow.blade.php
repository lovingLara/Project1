@section('name')
	 | {{$user->fname}}
@stop



@section('nav')
	<div class="hidden-nav">
		<ul>
			<li>Home</li>
			<li>Sports</li>
			<li>General</li>
			<li>News</li>
			<li>Entertainment</li>
		</ul>
	</div>
	<div class="logo">
        		<h4>Caught in the<span>Act</span></h4>
        </div>
	<div class="np"></div>
	<div class="parent-nav">
		<div>
			<ul>

				<li><a href="{{ URL::route('profile') }}" class="icons"><img src="{{ asset('img/' . $user->pic) }}" /></a>
					<ul>
						<li><a href="{{ URL::route('profile') }}">Settings</a></li>
						<li><a href="{{ URL::route('logout')}}">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="mid">
		{{$date->toFormattedDateString()}}
	</div>
	<div class="below-nav">
		<ul>
			<li><a href="{{ URL::route('dashboard')}}">NEWSFEED</a></li>
			<li><a href="{{ URL::route('viewHow') }}">HOW TO SUBMIT</a></li>
			<li><a href="{{ URL::route('video')}}">VIDEOS</a></li>
			<li class="pencil"><a href="{{ URL::route('newPost')}}">SUBMIT A REPORT</a></li>

		</ul>
	</div>
@stop

@section('reg')
	<a href="#">x</a>
	<h3>Registration Form</h3>
	<form action="{{URL::route('newUser')}}" method="post" autocomplete="off">
		<div class="form-group">
			<label for="fname">Firstname</label>
			<input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname..." required>
		</div>

		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname..." required>
		</div>

		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
		</div>


			<button type="submit" class="form-btn">Register</button>

	</form>
			<button class="form-btn"><a href="#login">Already Have an Account?</a></button>
@stop

@section('login')
		<a href="#">x</a>
		<h3>Login</h3>
		<form action="{{URL::route('loginUser')}}" method="post" autocomplete="off">

			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
			</div>
			 <label>
		      <input type="checkbox"> Remember me
		    </label><br><br>

				<button type="submit" class="form-btn">Login</button>
		</form>
@stop

@section('content')
<div class="hts">
        <ul>
            <li class="hvr-bob"><span class="glyphicon glyphicon-cloud-upload"></span></li>
            <li class="hvr-bob"><span class="glyphicon glyphicon-picture"></span></li>
            <li class="hvr-bob"><span class="glyphicon glyphicon-ban-circle"></span></li>
        </ul>


       <div class="col-md-2">
       <hr>
        <span>"A user is required to register an account before he/she can submit a report"
        <d>Upper-right corner to register</d></span>
       <hr>
       </div>
       <div class="col-md-2">
       <hr>
       <span>
        "You can Upload Image/Video and Write, and submit the report by clicking Submit"
       </span>
       <hr>
       </div>
       <div class="col-md-2">
       <hr>
        <span>"Avoid using word that may offend People"</span>
       <hr>
       </div>
</div>
@stop

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop