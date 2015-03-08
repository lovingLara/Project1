<!--Register Modal-->
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


@section('name')
    Index
@stop
@section('nav')
	<div class="logo">
		<h4>Tacloban <span>Times</span></h4>
	</div>

	<div class="np"></div>
	<div class="parent-nav">
		<div>
			<ul>
				<li><img src="img/facebook.ico" class="icons"/></li>
				<li><img src="img/twitter.ico" class="icons"></li>
				<li><a href="#login">Login</a>/<a href="#reg">Register</a></li>
			</ul>
		</div>
	</div>
	<div class="mid">{{$date->toFormattedDateString()}}</div>
	<div class="below-nav">
		<ul>
			<li><a href="{{ URL::to('/')}}">NEWSFEED</a></li>
			<li><a href="{{ URL::route('howto') }}">HOW TO SUBMIT</a></li>
			<li><a href="">VIDEOS</a></li>
			<li class="pencil"><a href="{{ URL::route('newPost')}}">SUBMIT A REPORT</a></li>
			
		</ul>
	</div>
	
@stop

<!---Slideshow-->
@section('headlines')
   <div class="slides">
   <div class="slidesContainer">
   <ul>
   @foreach($Lpost as $post)
      <li class="slide">
         <img src="{{ asset('img/' . $post->image) }}"/><br>
         <figcaption><a href="{{ URL::action('LoginUsersController@viewPost', array('id' => $post->id ))}}">{{$post->title}}</a></figcaption>
      </li>

    @endforeach
    </ul>
   </div>
   </div>
@stop

@section('content')
	<div class="dashboard">
	@foreach (array_chunk($posts->getCollection()->all(),4) as $row)
		<div class="row">
			@foreach($row as $post)
				<article class="col-md-4 effect4" class="dash-box">
					<p></p>
					<img src="{{ asset('img/' . $post->image) }}" />
					<b>{{$post->title}}</b>
					<br>
					<d>By {{$post->user->fname}}</d>
					<div class="likes"><span class="glyphicon glyphicon-heart"></span><d>{{$post->likes}}<d></div>
					<div class="caption">
					<b><h4>{{$post->title}}</h4></b>
					<a href="{{ URL::action('LoginUsersController@viewPost' , array('id' => $post->id))}}">Read More</a>
					<hr>
					<d>{{$post->created_at->toFormattedDateString()}}</d>
					</div>
				</article>
			@endforeach
		</div>
	@endforeach
	
	<div class="page">
	{{$posts->appends(Request::only('difficulty'))->links()}}
	</div>
	</div>
@stop

<!--Login Modal-->
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

@section('errors')
	@if ($errors->any())
        @if(Session::has('message'))
    	    <div class="alert alert-info" role="alert">
            	  		{{ Session::get('message')}}
            </div>
    	@endif
	@endif

@stop

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop