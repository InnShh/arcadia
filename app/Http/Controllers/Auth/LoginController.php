<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function redirectTo()
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        if ($user->isEmployee()) {
            return $this->redirectTo = route('feeding-reports.create');
        } elseif ($user->isVeterinary()) {
            return $this->redirectTo = route('animals.index');
        } elseif ($user->isAdmin()) {
            return $this->redirectTo = route('users.index');
        }
        abort(403);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
