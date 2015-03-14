@section('nav')
	<div class="hidden-nav">
		<ul>
			<li>Home</li>
			<li>Sports</li>
			<li>General</li>
			<li>News</li>
			<li>Entertainment</li>
		</ul>
	</div>
	<div class="logo">
		<h4>Tacloban <span>Times</span></h4>
	</div>
	<div class="np"></div>
	<div class="parent-nav">
		<div>
			<ul>
				<li><a href=""><img src="/img/facebook.ico" class="icons"/></a></li>
				<li><a href=""><img src="/img/twitter.ico" class="icons"/></a></li>
				<li><a href="{{ URL::route('profile') }}" class="icons"><img src="{{ asset('img/' . $users->pic) }}" /></a>
					<ul>
						<li><a href="">Settings</a></li>
						<li><a href="{{ URL::route('logout')}}">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="mid">
		{{$date->toFormattedDateString()}}
	</div>
	<div class="below-nav">
		<ul>
			<li><a href="{{ URL::route('dashboard')}}">NEWSFEED</a></li>
			<li><a href="{{ URL::route('viewHow') }}">HOW TO SUBMIT</a></li>
			<li><a href="">VIDEOS</a></li>
			<li class="pencil"><a href="{{ URL::route('newPost')}}">SUBMIT A REPORT</a></li>
			
		</ul>
	</div>
@stop


@section('content')
	<div class="view-post">
		<div class="body">
			<h3>{{$posts->title}}</h3>
			<h6>{{$posts->created_at->toFormattedDateString()}}</h6>
			<span>By {{$posts->user->fname}}</span>
			<p><img src="{{ asset('img/' . $posts->image) }}" class="img-rounded"/></p>
			<code>{{$posts->content}}</code><br>
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
	</div>

@stop




