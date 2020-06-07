<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Session;
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

    public function authenticated()
    {
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        $userTipo = Auth::user()->tipo;

        Session::put('name', $userName);
        Session::put('id', $userId);

        if ( $userTipo == 'ADM' ) {
            return redirect('/painel');
        }
        
         return redirect('/');
        
    }

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

    // public function login(Request $request)
    // {
    //     dd( Auth::attempt(['email' => 'moraesdan89@gmail.com', 'password' => 'E']) );

    //     // $this->validateLogin($request);

    //     // if ($this->hasTooManyLoginAttempts($request)) {
    //     //     $this->fireLockoutEvent($request);

    //     //     return $this->sendLockoutResponse($request);
    //     // }

    //     // if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_activated' => 1])) {
    //     //     // return redirect()->intended('dashboard');
    //     // }  else {
    //     //     $this->incrementLoginAttempts($request);
    //     //     return response()->json([
    //     //         'error' => 'This account is not activated.'
    //     //     ], 401);
    //     // }

    //     // $this->incrementLoginAttempts($request);
    //     // return $this->sendFailedLoginResponse($request);
    // }

    // protected function credentials(Request $request)
    // {
    //     $data = $request->all();

    //     //dd($data);
    //     //return $data;
    // }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect("/");
    }
}
