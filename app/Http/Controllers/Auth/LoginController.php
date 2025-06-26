<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< HEAD
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
>>>>>>> b02e2d1f6f8b44b41b9c92108e8219b42c1e8da8

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
    protected $redirectTo = '/profile/edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD
    
    public function login(Request $request) {
        // Validasi input login + hCaptcha
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'h-captcha-response' => ['required', function ($attribute, $value, $fail) {
                $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
                    'secret' => env('HCAPTCHA_SECRET'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                if (!optional($response->json())['success']) {
                    $fail('Verifikasi captcha gagal. Silakan coba lagi.');
                }
            }],
        ]);

        if (Auth::attempt($request->only('username', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectPath());
        }

        throw ValidationException::withMessages([
        'username' => [trans('auth.failed')],
        ]);
    }
}
=======

    /**
     * Override default validation untuk login, termasuk validasi h-captcha.
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'h-captcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('HCAPTCHA_SECRET'),
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!data_get($response->json(), 'success')) {
            return redirect()->back()
                ->withErrors(['h-captcha-response' => 'Captcha tidak valid'])
                ->withInput($request->only($this->username(), 'remember'));
        }
    }
}
>>>>>>> b02e2d1f6f8b44b41b9c92108e8219b42c1e8da8
