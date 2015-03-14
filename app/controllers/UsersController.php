<?php

class UsersController extends BaseController {

	protected $layout = 'layout.master';

	public function index()
	{
		$posts = Post::where('reviewed', '=' , 1)->orderBy('created_at', 'DESC');
        $post = Post::where('headline', '=' , 1)->get();
		$url = asset('img/logo.gif');
		$mytime = Carbon\Carbon::now();
        $headlines = Headlines::orderBy('created_at', 'DESC')->get();
		$this->layout->content = View::make('partials.index',
            array('posts' => $posts->paginate(12)))
            ->with('img', $url)
            ->with('date' , $mytime)
            ->with('headline',$headlines)
            ->with('Lpost', $post);
	}

    public function howto()
    {
        $mytime = Carbon\Carbon::now();
        $this->layout->content = View::make('partials.howtosubmit')->with('date',$mytime);
    }

	public function newUser()
	{
		$newUser = new user();
		$newUser->fname = Input::get('fname');
		$newUser->surname = Input::get('surname');
		$newUser->email = Input::get('email');
		$newUser->password = Hash::make(Input::get('password'));
		$newUser->save();

        Session::flash('message', 'Registration Success');
		return Redirect::to('/');
	}

	public function loginUser()
	{

		$error = 'Login Credentials not found';

		$input = Input::all();

		$attempt = Auth::attempt([
			'email' => $input['email'],
			'password' => $input['password']
			]);


		if($attempt)
		{
			if(Auth::user()->type == 1)
			{
				return Redirect::action('AdminController@index');
			}
			else
			{
				if(Auth::user()->status == 0)
				{
					$user  = Auth::user();
					$user->is_online = 1;
					$user->save();
					return Redirect::action('LoginUsersController@profile');
				}
				else
				{
					Session::flash('message', 'Account Temporarily Blocked');
					return Redirect::back()->withErrors($attempt);
				}
			}
		}
		else
		{
			Session::flash('message', "Username and Password not found");
			return Redirect::back()->withErrors($attempt);
		}
		
	}
}
