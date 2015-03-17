<?php

class AdminController extends \BaseController {


	public function index()
	{
		return View::make('admin.admin');
	}

    public function userdelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::back();
    }

    public function userprofile($id)
    {
        $user = User::find($id);
        return View::make('admin.userprofile')
                ->withUser($user);
    }

    public function search_keyword()
    {
        $input = Input::get('keyword');
        $result = Post::where('title','LIKE','%' .$input. '%')->get();

        return View::make('admin.result')
                ->withResults($result);
    }

    public function permit($id)
    {
            $post = Post::find($id);
            $post->reviewed = 1;
            $post->save();

            return Redirect::back();
    }

	public function view()
	{
		$posts = Post::all();
		return View::make('admin.viewall')->with('post', $posts);
	}

    public function headlines()
    {
        return View::make('admin.headlines');
    }

    public function hlsubmit()
    {
        if(Input::hasFile('image')){
            $image = Input::file('image');
            $filename = $image->getClientOriginalName();
            //saving image to public folder
            Image::make($image->getRealPath())->resize('150', '150')->save('public/headlines' .$filename);
            $headlines = new Headlines;
            $headlines ->title = Input::get('title');
            $headlines ->content = Input::get('content');
            $headlines ->pic = $filename ;
            $headlines->save();

        }
            $headlines = new Headlines;
            $headlines ->title = Input::get('title');
            $headlines ->content = Input::get('content');
            $headlines->save();


        return Redirect::route('headlines');
    }

	public function view_post($id)
	{
		$post = Post::find($id);
		return View::make('admin.view_post')->with('post', $post);	
	}

	public function delete($id)
	{
		$post = Post::find($id);
		$post->delete();
		return Redirect::route('view');
	}

	public function view_User()
	{
		$users = User::where('type' ,'=', 0)->orderBy('fname', 'asc')->get();
		return View::make('admin.view_users')->with('users', $users);
	}

	public function block($id)
	{
		$user = User::find($id);
		$user->status = 1;
		$user->save();
		return Redirect::route('view_User');
	}

	public function unblock($id)
	{
		$user = User::find($id);
		$user->status = 0;
		$user->save();	
		
		return Redirect::route('view_User');
	}

	public function email()
	{
		return View::make('admin.email');
	}

	public function email_submit()
	{
			/*$validator = Validator::make(
				array('content' => Input::get('message')),
				array('content' => 'required|min:10')
			);

			if ($validator->fails()){
				return Response::json([
					'success'=>false,
					'error'=>$validator->errors()->toArray()
					]);
			}

			return Response::json(['success'=>true]);
			*/
		$subject = Input::get('subject');
		$content = Input::get('message');
		$rules = array(
			'subject' => 'required',
			'message' => 'required',
			'sendto' => 'required'
		);

	
			Mail::send('admin.message', array('content' => $content), function($message){

			$message->to('aseanroger30@gmail.com', 'Poge sean')->subject('Urgent Matter');
			});

			Session::flash('message', 'Account Temporarily Blocked');
			return Redirect::route('email');
	}

	public function mailPost($id){
		
		$post = Post::find($id);

		Mail::send('admin.emailPost', array('content' => $post), function($message){

			$message->to('aseanroger30@gmail.com', 'Poge sean')->subject('Urgent Matter');
			});

			Session::flash('message', 'Account Temporarily Blocked');
		return Redirect::back();

	}

	public function logout()
	{
			//$user = Auth::user();
			//$user->is_online = 0;
			//$user->save();
			Auth::logout();
			return Redirect::to('/');
	}

    public function pending()
    {
        $posts = Post::where('reviewed', '=' , 1)
                    ->orderBy('created_at', 'DESC');
        return View::make('admin.pending')
        ->with('post',$posts);
    }

    public function post_head()
    {
        if(Input::hasFile('image') )
        {
            $mytime = Carbon\Carbon::now();
            $image = Input::file('image');
            $filename = $image->getClientOriginalName();
            Image::make($image->getRealPath())->save('public/img/' . $filename);
            $users = Auth::user();
            //saving image to database
            $post = new Post();
            $post->title = Input::get('title');
            $post->content = nl2br(Input::get('content'));
            $post->image = $filename;
            $users->post()->save($post);


            return Redirect::route('headlines');
        }
        else
        {
            $users = Auth::user();
            $post = new Post();
            $post->title = Input::get('title');
            $post->content = nl2br(Input::get('content'));;
            $users->post()->save($post);
            return Redirect::route('headlines');
        }

    }
	
}
