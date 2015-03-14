@section('nav')
	<ul>
		<li></li>
		<li><a href="{{ URL::route('dashboard')}}">Reports</a></li>
		<li> </li>
		<li>{{$users->fname}} | <a href="{{ URL::route('profile') }}">Profile</a>
		</li>
	</ul>
@stop


@section('content')

		<div class="profile-header">
			<ul>
				<li></li>
				<li><a href="{{ URL::route('profile')}}" class="prof-btn" >Profile</a></li>
			</ul>
		</div>
		
		<div class="form-container">
			<h2>Update Post</h2>
			<hr>
			<form action="{{ URL::route('update', array('id' => $post->id))}}" method="post">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" readonly>
				</div>

				<div class="form-group">
					<label for="content">Write Report</label>
					<textarea class="form-control" name="content" id="content" rows="10">{{$post->content}}</textarea>
				</div>

				<input type="submit" class="btn btn-primary" value="Update">
			</form>
		</div>
@stop