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

            <h3>Profile <span class="glyphicon glyphicon-user"></span></h3>

			<section class="settings">
                    <div class="row">
                        <div class="col-md-1">
                        <img src="{{ asset('img/' . $user->pic) }}" class="img-rounded" alt="Responsive image"/>
                        </div>

                       <div class="col-md-1">
                            <dl class="dl-horizontal">
                              <dt>Firstname</dt>
                              <dd>{{$user->fname}}</dd>
                              <dt>Surname</dt>
                              <dd>{{$user->surname}}</dd>
                              <dt>Email</dt>
                              <dd>{{$user->email}}</dd>
                               <dt>Join Date</dt>
                               <dd>{{$user->created_at}}</dd>
                               <dt><a href="{{ URL::route('viewUpdater',array('id' => $user->id)) }}">Edit</a></dt>
                            </dl>
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
                       <a href="{{ URL::route('delete_post', array('id' => $posts->id))}}">Delete</a>
                       | <a href="{{ URL::route('editPost', array('id' => $posts->id))}}">Edit</a>
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