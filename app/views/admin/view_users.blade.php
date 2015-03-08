@extends('layout.admins')


@section('banner')
  <a href="{{ URL::route('logout') }}">Logout</a>
@stop

@section('nav')

			<ul>
				<li><a href="{{URL::route('index') }}">Home</a></li>
				<li><a href="{{ URL::route('headlines') }}">Headlines</a></li>
				<li><a href="{{ URL::route('email')}}">Email</a></li>
				<li><a href="{{ URL::route('view') }}">ViewPost</a></li>
				<li><a href="">Pendings</a></li>
				<li><a href="{{ URL::route('view_User') }}">ViewUsers</a></li>
			</ul>

@stop

@section('content')
<div>
<h4>List of All Users</h4>
</div>
	
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th>Name</th>
				<th>Surame</th>
				<th>Email</th>
				<th>Status</th>
				<th>Online</th>
				<th>Join Date</th>
				<th>Actions</th>
			</thead>
			@foreach($users as $user)
			<tr>
				<td>{{$user->fname}}</td>
				<td>{{$user->surname}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->status}}</td>
				<td>{{$user->is_online}}</td>
				<td>{{$user->created_at->toFormattedDateString()}}</td>
				<td>
					<a href="{{ URL::route('block', array('id' => $user->id))}}">Block</a> | 
					<a href="">Delete</a> |
					<a href="">View</a> |
					<a href="{{ URL::route('unblock', array('id' => $user->id)) }}">Unblock</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
@stop