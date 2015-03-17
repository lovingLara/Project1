@extends('layout.admins')

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
<h3>Search Results</h3>
       <div class="table-responsive">
               <table class="table table-bordered">
        <thead>
            <th>Title</th>
            <th>Creation Date</th>
            <th>Posted by</th>
            <th>Action</th>
        </thead>
        @foreach($results as $result)
        <tr>
            <td><a href="{{ URL::route('view_post', array('id' => $result->id))}}">{{$result->title}}</a></td>
            <td>{{$result->created_at->diffForHumans()}}</td>
            <td>{{$result->user->fname}}</td>
            <td>
                 <a href="{{ URL::route('delete', array('id' => $result->id))}}">Delete</a>
            </td>
        </tr>
        @endforeach
       </table>
      </div>
@stop