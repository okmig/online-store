<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function save(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8'
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $save = $customer->save();

        if($save) {
            return back()->with('success', 'New user has been successfully added to database.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userInfo = Customer::where('email','=',$request->email)->first();
        
        if(!$userInfo) {
            return back()->with('fail', 'We can not recognize your email address.');
        } else {
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUserId', $userInfo->id);
                return redirect('/user/profile');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function logout() {
        if(session()->has('LoggedUserId')) {
            session()->pull('LoggedUserId');
            return redirect('/auth/login');
        }
    }
}
