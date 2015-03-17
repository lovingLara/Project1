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
    <div class="container">
    <h3>{{$user->fname}}'s Profile <span class="glyphicon glyphicon-user"></span></h3>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-2">
           <img src="{{ asset('img/' . $user->pic) }}" class="img-rounded" alt="Responsive image"/>
      </div>
      <div class="col-md-4">
             <dl class="dl-horizontal">
                <dt>Firstname</dt>
                <dd>{{$user->fname}}</dd>

                <dt>Surname</dt>
                <dd>{{$user->surname}}</dd>

                <dt>Email</dt>
                <dd>{{$user->email}}</dd>

                <dt>Join Date</dt>
                <dd>{{$user->created_at}}</dd>

             </dl>
      </div>

      <div class="col-md-6">
            <div class="panel panel-info">

              <div class="panel-heading">All Post <span class="badge">{{$user->post->count()}}</span></div>
              <table class="table">
                    <thead style="font-size: 12px;">
                        <th>Title</th>
                        <th>Date Submitted</th>
                    </thead>
                   @foreach($user->post as $post)
                    <tr style="font-size: 10px;">
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                    </tr>
                   @endforeach
              </table>
            </div>
      </div>



    </div>
@stop
