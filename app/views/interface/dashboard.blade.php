@section('name')
	 | {{$user->fname}}
@stop

@section('headlines')
    <div class="boxs">
        <span>Headlines Today</span>
    </div>
    <div class="parentCnt">

            <div class="wrapper">
            @foreach($Lpost as $post)
                    <div class="cnt" id="itemOne">
                    <a href=""><figcaption>{{$post->title}}</figcaption></a>
                     <img src="{{ asset('img/' .$post->image) }}" />
                    </div>
            @endforeach
           </div>
    </div><br>
    <hr>
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
				<li><a href=""><img src="img/facebook.ico" class="icons"/></a></li>
				<li><a href=""><img src="img/twitter.ico" class="icons"/></a></li>
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
					<b>{{$post->title}}</b><br>
					<d>{{$post->user->displayname}}</d>
					<div class="likes"><span class="glyphicon glyphicon-heart"></span><d>{{$post->likes}}<d></div>
					<div class="caption">
					<b><h4>{{$post->title}}</h4></b>
					<a href="{{ URL::action('LoginUsersController@viewPost' , array('id' => $post->id))}}">Read More</a>
					<hr>
					<e>{{$post->created_at->toFormattedDateString()}}</e>
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

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop