<!--Register Modal-->
@section('reg')
	<a href="#">x</a>
	<h3>Registration Form</h3>
	<form action="{{URL::route('newUser')}}" method="post" autocomplete="off">

	    <div class="form-group">
                			<label for="fname">Display Name</label>
                			<input type="text" class="form-control" id="disp" name="disp" placeholder="Displayname..." required>
         </div>


		<div class="form-group">
			<label for="fname">Firstname</label>
			<input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname..." required>
		</div>

		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname..." required>
		</div>

		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
		</div>


			<button type="submit" class="form-btn">Register</button>

	</form>
			<button class="form-btn"><a href="#login">Already Have an Account?</a></button>
@stop


@section('name')
    Index
@stop
@section('nav')
	<div class="logo">
        		<h4>Caught in the<span>Act</span></h4>
        </div>

	<div class="np"></div>
	<div class="parent-nav">
		<div>
			<ul>

				<li><a href="#login">Login</a>/<a href="#reg">Register</a></li>
			</ul>
		</div>
	</div>
	<div class="mid">{{$date->toFormattedDateString()}}</div>
	<div class="below-nav">
		<ul>
			<li><a href="{{ URL::to('/')}}">NEWSFEED</a></li>
			<li><a href="{{ URL::route('howto') }}">HOW TO SUBMIT</a></li>
			<li><a href="{{ URL::action('UsersController@video') }}">VIDEOS</a></li>
			<li class="pencil"><a href="{{ URL::route('newPost')}}">SUBMIT A REPORT</a></li>

		</ul>
	</div>

@stop


@section('content')
       <div class="view-post">
    @if($posts->videos === '')
        <div class="body">
        			<h3>{{$posts->title}}</h3>
        			<h6>{{$posts->created_at->toFormattedDateString()}}</h6>
        			<span>By {{$posts->user->fname}}</span>
        			<p><img src="{{ asset('img/' . $posts->image) }}" class="img-rounded"/></p>
        			<p>{{$posts->content}}<p><br>
        		<p></p>
        		</div>
                    <a href="{{ URL::route('like', array('id' => $posts->id)) }}" class="like">Like<span class="badge">{{$posts->likes}}</span></a>
        			<a href="#" class="like" id="like">Like</a>
        		<hr>
        		<section>
        			<h5>LEAVE US A COMMENT <span class="badge">{{$posts->comment->count()}}</span></h5>

        			<form action="{{ URL::route('createComment', array('id' => $posts->id))}}" method="post">
        				<div class="form-group">
        					<input class="form-control" type="text" placeholder="Comment..." name="content">
        				</div>
        			<input type="submit" class="btn btn-default" />
        			</form>
        		</section><br>

        		<section class="comments">
        			@foreach($posts->comment as $comments)
        			        <blockquote>{{$comments->content}}</blockquote>
        			@endforeach
        		</section>
    @elseif($posts->vidoes !== '')
        <div class="body">
        			<h3>{{$posts->title}}</h3>
        			<h6>{{$posts->created_at->toFormattedDateString()}}</h6>
        			<span>By {{$posts->user->fname}}</span><br>
        			<p>{{$posts->content}}</p><br>
        			<video width="600" height="500" controls preload="metadata">
        			    <source src="{{ asset('img/'. $posts->videos)}}" type='video/mp4 codecs="vp8.0, vorbis"' >
        			    <source src="{{ asset('img/'. $posts->videos)}}" type='video/webm'>
        			    <source src="{{ asset('img/'. $posts->videos)}}" type='video/m4v'>
        			    <source src="{{ asset('img/'. $posts->videos)}}" type='video/x-m4v'>
        			    <source src="{{ asset('img/'. $posts->videos)}}" type='video/ogg'>


        			    Your browser does not support the video tag.
        			</video>
        			<p></p>
        		</div>
                    <a href="{{ URL::route('like', array('id' => $posts->id)) }}" class="like">Like<span class="badge">{{$posts->likes}}</span></a>
        			<a href="#" class="like" id="like">Like</a>

        		<hr>
        		<section>
        			<h5>LEAVE US A COMMENT <span class="badge">{{$posts->comment->count()}}</span></h5>

        			<form action="{{ URL::route('createComment', array('id' => $posts->id))}}" method="post">
        				<div class="form-group">
        					<input class="form-control" type="text" placeholder="Comment..." name="content">
        				</div>
        			<input type="submit" class="btn btn-default" />
        			</form>
        		</section><br>

        		<section class="comments">
        			@foreach($posts->comment as $comments)
        			        <blockquote>{{$comments->content}}</blockquote>
        			@endforeach
        		</section>

        @endif
        	</div>


           <script>
               $(document).ready(function(){
                   $('#like').click(function(e){
                       e.preventDefault();


                        var val

                       $.ajax({
                        url:'/like{id}',
                        method:'get',
                        data:{},
                        processData:false,
                        contentType:false,
                        cache:false,
                        sucess:function(data){

                            console.log(data);
                        },
                        error:function(){}
                       });
                   })

               });

           </script>


@stop
