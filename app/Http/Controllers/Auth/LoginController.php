<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectAdmin = RouteServiceProvider::HOME;
    protected $redirectStudent = RouteServiceProvider::STUDENT;
    protected $redirectTeacher = RouteServiceProvider::TEACHER;
    protected $redirectParent = RouteServiceProvider::PARENT;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }



    public function login(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard($request->type)->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if ($request->type == 'student') {
                // return $request;
                return redirect()->intended(RouteServiceProvider::STUDENT);
            } elseif ($request->type == 'parent') {
                return redirect()->intended(RouteServiceProvider::PARENT);
            } elseif ($request->type == 'teacher') {
                return redirect()->intended(RouteServiceProvider::TEACHER);
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
        return redirect()->route('login.selection', $request->type)->withInput($request->only(['email', 'remember']))->with('invalid', '444');
    }





    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('selection');
    }
}
