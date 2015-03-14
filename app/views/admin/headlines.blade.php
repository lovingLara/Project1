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
<div class="emailForm">
{{Form::open(array('url' => 'admin/headlines' , 'files' => 'true', 'method' => 'post'))}}
    {{Form::label('Title')}}
    {{Form::text('title', null, array(
       'class' => 'form-control',

    ))}}

    {{Form::label('content')}}
    {{Form::textarea('content', null, array(
           'class' => 'form-control',
           'id' => 'control'
        ))}}

    {{Form::label('image')}}
    {{Form::file('image',array(
    			'class' => 'btn btn-primary'
    ))}}<br>

    {{Form::submit('submit')}}

{{Form::close()}}
</div>
@stop