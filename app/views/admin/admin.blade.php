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
<hr>
<div class="search">
	{{Form::open(array('url'=>'','method'=>'post'))}}
	    {{Form::text('keyword',null,array(
	        'class' => 'form-control input-lg',
	        'placeholder' => 'Enter keyword...(e.g. post title)'
	    ))}}<bR>
	    <div class="submit1">
	    {{Form::submit('Search',array(
	        'class' => 'btn btn-info btn-lg btn-block',
	    ))}}
	    </div>
	{{Form::close()}}
    </div>
<br>
    <div class="searchs">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Title</th>
                <th>Date Created</th>
                <th>Actions</th>
            </thead>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    </div>

<script>
    $(document).ready(function(){

    $('form').submit(function(e){
    e.preventDefault();

         $.ajax({
             url:'/admin/search',
             method:'post',
             data: {},
             processData:false,
             contentType:false,
             cache:false,
             sucess:function(data){},
             error:function(){}
             });
        });
    });
</script>



@stop
