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
				<li><a href="{{URL::route('pending')}}">Pendings</a></li>
				<li><a href="{{ URL::route('view_User') }}">ViewUsers</a></li>
			</ul>

@stop

@section('content')
<hr>
<div class="search">
        {{Form::open(array('url' => 'admin/search', 'method' => 'post'))}}
            {{Form::text('keyword',null,array(
            'class' => 'form-control',
            'placeholder' => 'Enter keyword...'
            ))}}<br>
            {{Form::submit('Search',array(
               'class' => 'btn btn-default'
            ))}}

    </div>
<br>
    <div class="searchs">

@stop
