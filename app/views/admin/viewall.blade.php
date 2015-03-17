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
<h4>List of All Posts</h4>
</div>
<div class="table-responsive">
		<table class="table table-bordered" data-height='299'>
			<thead>
				<th>Title</th>
				<th>Date Submitted</th>
				<th>Action</th>
			</thead>
			@foreach($post as $posts)
			<tr>
				<td>{{$posts->title}}</td>
				<td>{{$posts->created_at->toFormattedDateString()}}</td>
				<td><a href="{{ URL::route('view_post', array('id' => $posts->id))}}">ReviewPost</a> | 
					<a href="{{ URL::route('delete', array('id' => $posts->id))}}">Delete</a> | 
					<a href="{{ URL::route('permit', array('id' => $posts->id))}}">Confirm</a> |
					<a href="{{ URL::route('mailPost', array('id' => $posts->id))}}">MailPost</a>
				</td>
			</tr>
			@endforeach		
		</table>
</div>	
@stop