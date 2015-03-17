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
                <td>{{$posts->created_at}}</td>
                <td>
                </td>
            </tr>
            @endforeach
       		</table>
       </div>
@stop()