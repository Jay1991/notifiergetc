<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

  // public function redirectPath(){
  //
  //  $redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo : '/test';
  //
  //  $url = \Config::get('app.url');
  //  $subDomain = Auth::user()->name;
  //  $scheme = parse_url($url, PHP_URL_SCHEME);
  // //  $host = parse_url($url, PHP_URL_HOST);
  //  return $scheme.'://'.$subDomain.'.'.'notifier.com'.$redirectTo;
  // }

  //  protected $redirectTo = '/test';

   protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
