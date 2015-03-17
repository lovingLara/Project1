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
	@if($post->videos === '')

	<div class="col-md-6"><img src="{{ asset('img/' . $post->image) }}" /></div>
	<div class="col-md-6">
		<span>{{$post->title}}</span>
	<blockquote>
	{{$post->content}}
	<cite>adasda</cite>
	</blockquote>
	
	<a href="{{ URL::route('permit', array('id' => $post->id))}}">Valid</a>
	<a href="">Edit</a>
	</div>

	@elseif($post->videos !== ' ')
	
	<div class="col-md-6">
		<video width="500" height="500" controls preload="metadata">
        <source src="{{ asset('img/'. $post->videos)}}" type='video/webm'>
        <source src="{{ asset('img/'. $post->videos)}}" type='video/ogg'>
            Your browser does not support the video tag.
        </video>
	</div>
	<div class="col-md-6">
		<h3>{{$post->title}}</h3>
	{{Form::open()}}
		<textarea class="form-control" readonly>{{$post->content}}</textarea>
	{{Form::close()}}
	<hr>	
	<a href="{{ URL::route('permit', array('id' => $post->id))}}">Valid</a>
	<a href="">Edit</a>
	</div>



	@endif
</div>
	
@stop