<?php

class AdminController extends \BaseController {


	public function index()
	{
		return View::make('admin.admin');
	}

    public function search()
    {
        if(Response::json()){
            RETURN 'submitted';
        }

      /*  $keyword = Input::get('keyword');

        $post = Post::where('title', 'LIKE', '%'.$keyword.'%')->get();

        return Redirect::route('index')->with('posts', $post);
      */


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

    public function recieve()
    {
        $image = Input::file('image');
        $filename = $image->getClientOriginalName();

        //saving image to public folder
        Image::make($image->getRealPath())->resize('150', '150')->save('public/headlines' .$filename);
        $headlines = new Headlines;
        $headlines ->title = Input::get('title');
        $headlines ->content = Input::get('content');
        $headlines ->pic = $filename ;
        $headlines->save();

        return Redirect::route('headlines');
    }

	public function update($id)
	{
		$post = Post::find($id);
		$post->reviewed = 1;
		$post->save();

		return Redirect::route('view');
	}

	public function view_post($id)
	{
		$post = Post::find($id);

		//dd($post);
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
	
}
