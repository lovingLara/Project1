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

	<div class="foo">
		<section>
				{{Form::open(array('action' => array('LoginUsersController@editPosts', $posts->id),'file' => 'true','method' => 'post' ,'enctype'=>'multipart/form-data'))}}
					
					{{Form::label('Title*')}}
					{{Form::text('title',$posts->title, array(
						'class' => 'form-control',
					))}}<br>
					
					{{Form::label('Content*')}}
					{{Form::textarea('content',$posts->content,array(
						'class' => 'form-control'
					))}}<br>

					{{Form::label('Image')}}
					{{Form::file('pic',array(
						'class' => 'btn btn-default'
					))}}<br>

					{{Form::label('Video')}}
					{{Form::file('vid',array(
						'class' => 'btn btn-primary'
					))}}<br>

					{{Form::submit('Save Changes',array('class' => 'btn btn-danger'))}}

		{{Form::close()}}	

		</section>
	</div>

@stop