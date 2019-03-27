<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
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
    protected $redirectTo = '/home';

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \ReflectionException
     */
    public function guest(Request $request)
    {
        $maxYear = now()->addYears(-19)->get('year');


        \Log::debug($request->year);
        \Log::debug('maxYear=' . $maxYear);

        $request->validate([
            'year' => "required|numeric|max:$maxYear"
        ],[
            'year.max'=>'Sorry, you have to be be over 18.'
        ]);


        $guest = User::firstOrCreate(
            [
                'name'     => 'Guest',
                'email'    => 'guest@example.com',
                'password' => ''
            ]
        );
        \Log::debug($guest->name);
        Auth::login($guest);


        return redirect('/home');


    }
}
