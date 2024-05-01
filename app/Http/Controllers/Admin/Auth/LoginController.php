<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Socialite;
use Auth;
use App\Models\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends \App\Http\Controllers\Controller
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        // $this->middleware('auth','guest', ['except' => 'logout']);
        // $this->middleware('auth');
    }

    // Logout
    public function logout()
    {
        try {
            Session::flush();
            Auth::logout();
        } catch (\Throwable $throwable) {
            Log::error($throwable);
        }
        return redirect('/');
    }

    /// Package Laravel/UI /// brooz

    /** AuthenticatesUsers
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginFormy()
    {
        if (\Auth::id()) {
            return redirect('/');
        }
        return view('admin.auth.login');
    }

    /** AuthenticatesUsers
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request, Session $session)
    {
        $this->validateLogin($request);

        // if (method_exists($this, 'hasTooManyLoginAttempts') &&
        //     $this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);
        //     return $this->sendLockoutResponse($request);
        // }
        // if ($this->attemptLogin($request)) {
        //     return $this->sendLoginResponse($request);
        // }
        // $this->incrementLoginAttempts($request);
        // return $this->sendFailedLoginResponse($request);

        /// Brooz Login
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => md5($request->password)], $request->remember)) {
            return redirect(route('admin.dashboard'));
        } else {
            session()->flash('wrong', 'مشخصات وارد شده با اطلاعات ما سازگار نیست.');
            return back();
        }

    }

    /** AuthenticatesUsers
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */ /// brooz
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],
            [
                'username.required' => 'نام کاربری تان را وارد کنید.',
                'password.required' => 'رمز عبور کاربری تان را وارد کنید.',
            ]
        );
    }

    /** AuthenticatesUsers
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // brooz
        return redirect('/admin');
    }

    /** AuthenticatesUsers
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        // return 'email'; // Brooz
        return 'username';
    }


    /** AuthRouteMethods
     * Register the typical authentication routes for an application.
     *
     * @param array $options /// brooz
     * @return callable
     */
    public function auth()
    {
        return function ($options = []) {
            $namespace = class_exists($this->prependGroupNamespace('Auth\LoginController')) ? null : 'Admin';

            $this->group(['namespace' => $namespace], function () use ($options) {
                // Login Routes...
                if ($options['login'] ?? true) {
                    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
                    $this->post('login', 'Auth\LoginController@login');
                }

                // Logout Routes...
                if ($options['logout'] ?? true) {
                    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
                }

                // Registration Routes...
                if ($options['register'] ?? true) {
                    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
                    $this->post('register', 'Auth\RegisterController@register');
                }

                // Password Reset Routes...
                if ($options['reset'] ?? true) {
                    $this->resetPassword();
                }

                // Password Confirmation Routes...
                if ($options['confirm'] ??
                    class_exists($this->prependGroupNamespace('Auth\ConfirmPasswordController'))) {
                    $this->confirmPassword();
                }

                // Email Verification Routes...
                if ($options['verify'] ?? false) {
                    $this->emailVerification();
                }
            });
        };
    }

}
