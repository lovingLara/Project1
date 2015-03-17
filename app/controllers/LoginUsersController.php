<?php

class LoginUsersController extends \BaseController {

	protected $layout = 'layout.master';



	public function profile()
	{
		if(Auth::check())
		{
			$users = Auth::user();
			$mytime = Carbon\Carbon::now();
			$this->layout->content = View::make('interface.profile', 
				array('user' => $users))
				->with('date', $mytime);
		}
		else
		{
			return Redirect::action('UsersController@login');
		}

	}

	public function editPost($id)
	{
			$post = Post::findOrFail($id);
			$users = Auth::user();
			$mytime = Carbon\Carbon::now();

			$this->layout->content = View::make('interface.editPost')
									->withUser($users)
									->withPosts($post)
									->withDate($mytime);

	}

	public function editPosts($id)
	{
		
		if(Input::hasFile('pic'))
		{
			$image = Input::file('pic');
			$filename = $image->getClientOriginalName();
			Image::make($image->getRealPath())->save('public/img/' . $filename);
			//saving image to database
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->content = nl2br(Input::get('content'));
			$post->image = $filename;
			$post->save();

            Session::flash('message','Successfuly Edited Post');
		   	return Redirect::back();
		}
        else if(Input::hasFile('vid'))
        {
            $destination = 'public/img';
            $input = Input::file('vid');
            $fileinput = $input->getClientOriginalName();
            $input = Input::file('vid')->move($destination,$fileinput)->getRealPath();

            $post = Post::find($id);
            $post->title = Input::get('title');
            $post->content = nl2br(Input::get('content'));
            $post->videos = $fileinput;
            $post->save();

            Session::flash('message','Successfuly Edited Post');
            return Redirect::back();
        }
        else if(Input::hasFile('image') || Input::hasFile('vid'))
            {
                $image = Input::file('pic');
                $filename = $image->getClientOriginalName();
                $input = Input::file('vid');
                $fileinput = $input->getClientOriginalName();

                Image::make($image->getRealPath())->save('public/img/' .$filename);

                //saving image to database
                $post = Post::find($id);
                $post->title = Input::get('title');
                $post->content = nl2br(Input::get('content'));
                $post->image = $filename;
                $post->videos = $fileinput;
                $post->save();

                Session::flash('message','Successfuly Edited Post');
                return Redirect::back();
            }
        else
        {
        	
			$post = Post::findOrFail($id);
			$post->title = Input::get('title');
			$post->content = nl2br(Input::get('content'));
			$post->save();
            
            Session::flash('message','Successfuly Edited Post');
            return Redirect::back();
		}
	}

    public function viewHow()
    {
        $user = Auth::user();
        $mytime = Carbon\Carbon::now();
        $this->layout->content = View::make('interface.viewHow')
            ->with('date',$mytime)
            ->withUser($user);
    }

	public function newPost()
	{
		$users = Auth::user();
		$category = category::all()->lists('name','id');
		$mytime = Carbon\Carbon::now();
		$this->layout->content = View::make('interface.createpost',array('user' => $users))->with( 'category', $category)->with('date', $mytime);
	}

	public function createPost()
	{

        if(Input::hasFile('pic') )
		{
			$mytime = Carbon\Carbon::now();
			$image = Input::file('pic');
			$filename = $image->getClientOriginalName();
			Image::make($image->getRealPath())->save('public/img/' . $filename);
			$users = Auth::user();
			//saving image to database
			$post = new Post();
			$post->title = Input::get('title');
			$post->content = nl2br(Input::get('content'));
			$post->image = $filename;
			$users->post()->save($post);

            Session::flash('message','Thank you For submitting a report');
		   	return Redirect::route('newPost');
		}
        else if(Input::hasFile('vid'))
        {
            $mytime = Carbon\Carbon::now();
            $users = Auth::user();
            $destination = 'public/img';
            $input = Input::file('vid');
            $fileinput = $input->getClientOriginalName();
            $input = Input::file('vid')->move($destination,$fileinput)->getRealPath();

            $post = New Post();
            $post->title = Input::get('title');
            $post->content = nl2br(Input::get('content'));
            $post->videos = $fileinput;
            $users->post()->save($post);

            Session::flash('message','Thank you For submitting a report');
            return Redirect::route('newPost');
        }
        else if(Input::hasFile('image') || Input::hasFile('vid'))
            {
                $mytime = Carbon\Carbon::now();
                $image = Input::file('pic');
                $filename = $image->getClientOriginalName();
                $input = Input::file('vid');
                $fileinput = $input->getClientOriginalName();

                Image::make($image->getRealPath())->save('public/img/' .$filename);

                $users = Auth::user();

                //saving image to database
                $post = new Post();
                $post->title = Input::get('title');
                $post->content = nl2br(Input::get('content'));
                $post->image = $filename;
                $post->videos = $fileinput;
                $users->post()->save($post);

                Session::flash('message','Thank you For submitting a report');
                return Redirect::route('newPost');
            }
        else
        {
			$users = Auth::user();
			$post = new Post();
			$post->title = Input::get('title');
			$post->content = nl2br(Input::get('content'));;
			$users->post()->save($post);

            Session::flash('message','Thank you For submitting a report');
			return Redirect::route('newPost');
		}

	}

	public function logout()
	{
			$user = Auth::user();
			$user->is_online = 0;
			$user->save();
			Auth::logout();
			return Redirect::to('/');
	}

	public function viewPost($id)
	{	
		$mytime = Carbon\Carbon::now();
		$post = Post::with('user')->find($id);
		$user = Auth::user();
		$this->layout->content = View::make('interface.viewPost')
		->with('posts', $post )
		->with('users',$user)
		->with('date',$mytime);

	}

	public function viewUpdate($id)
	{
		$user = Auth::user();
			
		$report = Post::find($id);


		$this->layout->content = View::make('interface.viewUpdate', 
			array('post' => $report,
			 	'users' => $user
			 ));
	}

	public function delete_post($id)
	{
		$post = Post::find($id);
		$post->delete();
		return Redirect::route('profile');
	}

	public function dashboard()
	{
        $head = Headlines::all();
		$mytime = Carbon\Carbon::now();
		$user = Auth::user();
		$posts = Post::where('reviewed', '=' , 1)
            ->where('videos', '=', '')
            ->orderBy('created_at', 'DESC');
        $post = Post::where('headline', '=' , 1)->get();
		$url = asset('img/logo.gif');
		$this->layout->content = View::make('interface.dashboard', 
			array('posts' => $posts->paginate(12)))
			->with('img', $url)
			->with('user', $user)
			->with('date', $mytime)
            ->with('Lpost', $post);
	}

	public function createComment($id)
	{
		$post = Post::find($id);
		$comment = new Comment();
		$comuser = $comment->user()->get();
		$comment->content = nl2br(Input::get('content'));
		$post->comment()->save($comment);

		return Redirect::route('viewPost', array('id' => $post->id))->with('commentr', $comuser);
	}

    public function viewUpdater($id)
    {
        $mytime = Carbon\Carbon::now();
        $user = User::find($id);
        $this->layout->content = View::make('interface.editUser')
                ->withUser($user)
                ->withDate($mytime);
    }

	public function updateUser($id)
	{

		if(Input::hasFile('pic'))
		{
			$image = Input::file('pic');
			$filename = $image->getClientOriginalName();
			//saving image to public folder
			$img = Image::make($image->getRealPath())->resize('150', '150')->save('public/img/' .$filename);
			$user = User::find($id);
            $user->displayname = Input::get('disp');
			$user ->fname = Input::get('fname');
			$user ->surname = Input::get('surname');
			$user ->pic = $filename ;
			$user->save();
		}
		else{
			$user = User::find($id);
			$user->fname = Input::get('fname');
			$user->surname = Input::get('surname');
			$user->save();
           
		}
		
		return Redirect::route('profile');

	}

	
	public function like($id)
	{

        $post = Post::findOrFail($id);
        $post->likes++;
        $post->save();

        return Redirect::back();
        /*if(Request::ajax()){
            $post = Post::findOrFail($id);
            $post->likes++;
            $post->save();
        }
        */
	}

    public function video()
    {
        $user = Auth::user();
        $posts = Post::where('reviewed', '=' , 1)
            ->where('videos', '!=', '')
            ->orderBy('created_at', 'DESC')->paginate(12);
        $mytime = Carbon\Carbon::now();
        $this->layout->content = View::make('interface.viewPostVid',
            array('posts' => $posts))
            ->with('date' , $mytime)
            ->with('user', $user);
    }
}
