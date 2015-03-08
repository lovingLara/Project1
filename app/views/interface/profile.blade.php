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
		<h4>Tacloban <span>Times</span></h4>
	</div>
	<div class="np"></div>
	<div class="parent-nav">
		<div>
			<ul>
				<li><a href=""><img src="img/facebook.ico" class="icons"/></a></li>
				<li><a href=""><img src="img/twitter.ico" class="icons"/></a></li>
				<li><a href="{{ URL::route('profile') }}" class="icons"><img src="{{ asset('img/' . $user->pic) }}" /></a>
					<ul>
						<li><a href="">Settings</a></li>
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
			<li><a href="{{ URL::to('Dashboard')}}">NEWSFEED</a></li>
			<li><a href="{{ URL::route('viewHow') }}">HOW TO SUBMIT</a></li>
			<li><a href="">VIDEOS</a></li>
			<li><a href="{{ URL::route('newPost')}}">SUBMIT A REPORT</a></li>
			
		</ul>
	</div>
@stop

@section('content')
		<div class="profile">
		<div>
		<h4>Settings</h4>
		</div>
			<section class="settings">
				<div class="row">

				{{Form::open(array('class' => 'form-inline', 'method' => 'post', 'files' => 'true', 'action' => array('LoginUsersController@updateUser', $user->id)))}}
				<div class="col-xs-8 col-sm-6">Name</div>
				<div class="col-xs-4 col-sm-6">{{Form::text('fname', $user->fname)}}</div><br>

				<div class="col-xs-8 col-sm-6">Surname</div>
				<div class="col-xs-4 col-sm-6">{{Form::text('surname', $user->surname)}}</div><br>


				<div class="col-xs-8 col-sm-6">Email</div>
				<div class="col-xs-4 col-sm-6">{{Form::text('email', $user->email, array(
				'readonly' => 'true'
				))}}</div><br>

				<div class="col-xs-8 col-sm-6">Image</div>
				<div class="col-xs-4 col-sm-6">{{Form::file('pic')}}</div>


				<div class="col-xs-8 col-sm-6">{{Form::submit('Update',array(
				'class' => 'btn btn-default'
					))}}</div>
				{{Form::close()}}
				</div>
			</section>
			<hr>
			<section class="row">

				<div class="col-md-8">
					<div class="col-xs-6 col-md-3"><img src="{{ asset('img/' . $user->pic) }}" class="img-rounded" alt="Responsive image"/></div>
					<div class="row">
						 <div class="col-xs-6 col-md-4">
						 	<ul>
						 		<li>Member since</li>
						 		<li>All Posts <span class="badge">{{$user->post->count()}}</span></li>
						 	</ul>
						 </div>
						  <div class="col-xs-6 col-md-4">
						  	<ul>
						  	<li>{{$user->created_at->toFormattedDateString()}}</li>
						  	<li>

						  	</li>
					    </ul>
					</div>
					</div>
                </section>
                <hr>
                <div class="panel panel-primary">
                <div class="panel-heading">All Posts&nbsp<span class="badge">{{$user->post->count()}}</span></div>
                        <div class="table-responsive">
                       <table class="table table-bordered"">
                       <thead>
                       <th>Title</th>
                       <th>Action</th>
                       </thead>
                       @foreach($user->post as $posts)
                       <tr>
                       <td><a href="{{ URL::route('viewPost',
                       array('id' => $posts->id))}}">
                       {{$posts->title}}</a>
                       </td>
                       <td>
                       <a href="{{ URL::route('delete_post', array('id' => $posts->id)) }}">Delete</a>
                       </td>
                       </tr>
                       @endforeach
                       </table>
                       </div>
                </div>
				</div>
				</div>


@stop

@section('footer')
<span><a href="">About</a> | Created with <a  target="_blank" href="http://laravel.com/">Laravel</a> | site design / logo © 2015 Tacloban Times</span>
@stop