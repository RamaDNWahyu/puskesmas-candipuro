<?php

namespace App\Http\Controllers\Auth;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        Helper::saveLog('Pengguna '. $user->name .' Berhasil Login pada IP : ' . $request->ip(), 'log', $user->id);
    }

    protected function credentials(Request $request)
        {
          if(is_numeric($request->get('username'))){
            return ['no_rm'=>$request->get('username'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('username'), 'password'=>$request->get('password')];
          }
          return ['username' => $request->get('username'), 'password'=>$request->get('password')];
        }

}
