<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Helpers\MailsTrait;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
use App\Helpers\HelperFunctionTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HelperFunctionTrait, MailsTrait;

    public function login()
    {
        return view('website.authSystem.login');
    }

    public function postLogin(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::where('email', request('email'))->first();

            // return redirect()->route('usersPanel.dashboard', $user->id);
            return redirect(route('website.home'));
        }

        return back();
    }

    public function registerForm()
    {
        return view('website.authSystem.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'attach' => 'required',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',

            // 'g-recaptcha-response' => 'required',
        ]);
        $passwordValue = 'user' . $request->id . $this->randomString();
        // $password = Hash::make($passwordValue);
        $validatedData = $request->only('first_name', 'last_name', 'phone', 'email', 'password', 'attach');
        $validatedData['username'] = 'user_' . $this->randomCode(5);
        $validatedData['password'] = $passwordValue;
        // $validatedData['verify_code'] = $this->randomCode(4);
        $validatedData['code'] = strtoupper($request->first_name[0]) . strtoupper($request->last_name[0]) .  $this->randomCode(4);

        $user = User::create($validatedData);

        Auth::attempt(['email' => request('email'), 'password' => request('password')]);

        event(new Registered($user));
        Mail::to('admin@ellistaa.com')->send(new RegistrationMail($user, $passwordValue));

        return redirect(route('website.home'));
    }

    // public function verifyCode(Request $request)
    // {
    //     $validatedData = $request->validate(['verify_code' => 'required|min:4|max:5']);

    //     $user = auth()->user();

    //     if ($user->verify_code == request('verify_code')) {

    //         $user->update(['email_verified_at' => now(), 'steps' => 4]);
    //     }
    // }

    // public function resendCodeToUser()
    // {
    //     $user = auth()->user();

    //     $this->sendCodeToMail($user->email, $user->verify_code);

    //     return back();
    // }


    // public function approval()
    // {
    //     return view('approval');
    // }


    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
