<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
 */
    public function redirectToProvider()
    {
        $params = [
         'hd' => env('GOOGLE_CLIENT_HD'),
         'access_type' => 'offline',
     ];

     return Socialite::driver('google')
     ->scopes(["https://www.googleapis.com/auth/drive"])
     ->with($params)
     ->redirect();
 }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
    	$user = Socialite::driver('google')->user();
    	$token = $user->token;
    	$user = User::where('email', $user->email)->first();
    	if($user) {
    		$user->refresh_token = $token;
    		$user->save();
    		Auth::loginUsingId($user->id);

    		return redirect('/');
    	}
    	return redirect()->route('login')->with('error', 'User not found');
    }
}
