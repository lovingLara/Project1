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


@section('content')	
    @if(Session::has('message'))
        <div class="alert alert-info" role="alert" style="width:400px;">
            {{Session::get('message')}}
        </div>
    @endif
	<div class="create-post">
	<div class='row' id="row">
		<div class="col-md-6">
		<h4>*Report</h4>
		<hr>
		{{ Form::open(array('url' => 'Newpost','file' => 'true','method' => 'post' ,'enctype'=>'multipart/form-data')) }}
			
			{{Form::label('title', '*Title')}}
			{{Form::text('title', null,array(
			'class' => 'form-control',
			'placeholder' => 'Title...',
			'required'
			))}}<br>

			{{Form::label('content', '*Content')}}
			{{Form::textarea('content',null ,array(
			'class' => 'form-control',
			'placeholder' => 'Write here...',
			'required'
			))}}

			<br>
			{{Form::file('pic', array(
			'class' => 'btn btn-info',

			))}}<p class="p">You are only allowed to submit one file photo*</p>

			{{Form::file('vid',array(
			'class' => 'btn btn-info',
			'name' => 'vid'
			))}}<p class="p">Submit Video file here*</p><br>

			{{Form::submit('Publish', array(
			'class' => 'btn btn-default'
			))}}

		{{Form::close()}}
		</div>

		<div class="col-md-6">
			<div>
			<p>Welcome patrollers thank you for trusting us by send report. Send in your reports by clicking
			"Submit report". Please be mindful of the words that you are going to use. 
			</p>
			</div>

			<div>
				<p>Thank you for your Interest in submitting a report.
					Please fill up the form and upload photo/video. After
					we review your post only then we can display it in newsfeed, Thank you.
				</p>	
			</div>
		</div>

		</div>
	</div>
@stop

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop