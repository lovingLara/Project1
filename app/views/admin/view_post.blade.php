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

<div class="row">
	<div class="col-md-6"><img src="{{ asset('img/' . $post->image) }}" /></div>
	<div class="col-md-6">
		<span>{{$post->title}}</span>
	<blockquote>
	{{$post->content}}
	<cite>adasda</cite>
	</blockquote>
	
	<a href="{{ URL::route('update', array('id' => $post->id))}}">Valid</a>
	</div>

	
</div>
	
@stop