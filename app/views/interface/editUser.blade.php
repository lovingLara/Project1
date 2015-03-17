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
<div class="profile">
<div class="editer">
<h2>Edit Profile <span class="glyphicon glyphicon-wrench"></span></h2><br>
<div class="prf">
{{Form::open(array('action' => array('LoginUsersController@updateUser', $user->id),'method' => 'post', 'file' => 'true', 'enctype' => 'multipart/form-data'))}}
        <dl class="dl-horizontal">

          <dt>{{Form::label('Display Name')}}</dt>
          <dd>{{Form::text('disp', $user->displayname, array( 'class' => 'form-control'))}}</dd><br>

          <dt>{{Form::label('Firstname')}}</dt>
          <dd>{{Form::text('fname', $user->fname,array( 'class' => 'form-control'))}}</dd><br>

          <dt>{{Form::label('Surname')}}</dt>
          <dd>{{Form::text('surname', $user->surname,array( 'class' => 'form-control')}}</dd><br>

          <dt>{{Form::label('Email')}}</dt>
          <dd>{{Form::text('email', $user->email,array( 'class' => 'form-control'))}}</dd><br>

           <dt>{{Form::label('Image')}}</dt>
           <dd>{{Form::file('pic',array('class' => 'btn btn-primary'))}}</dd><br>


           <dd>{{Form::submit('Save Changes')}}</dd>
        </dl>
</div>
</div>
</div>
@stop

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop