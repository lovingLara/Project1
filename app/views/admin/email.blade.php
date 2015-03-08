@extends('layout.admins')

@section('errors')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-info info" style="display:none;">
					<ul>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop

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
<div class="frm">
<div class="alert alert-danger" id="alrt">
<p>Please Note that this email will automatically redirected to the Authorities(Police)!</p>
</div>
<div class="emailForm">
	{{Form::open(array('url' => 'admin/send', 'method' => 'post'))}}

		{{Form::label('Message')}}
		{{Form::textarea('message', null , array(
		'placeholder' => 'Write here..',
		'class' => 'form-control',
		'id' => 'message'
		))}}
		<br>

		{{Form::submit('Send Email', array(
		'class' => 'btn btn-primary'
		))}}
	{{Form::close()}}
</div>
</div>
@stop

