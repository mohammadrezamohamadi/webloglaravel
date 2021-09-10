<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function login(Request $request){


        $input=filter_var($request->input,FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';
        $password=$request->password;
        if($input=='email'){

            $email=$request->input;
            if(auth()->attempt(compact('password','email'))){

                $user=User::where('email',$email)->first();

                auth()->login($user);

                return redirect()->route('posts.index');
            }
            else {
                return back()->with('message','email in not valid');
            }
        }
        elseif(is_numeric($request->input)){

            $phone_number=$request->input;
            if(auth()->attempt(compact('password','phone_number'))){
                $user=User::where('phone_number',$phone_number)->first();

                auth()->login($user);

                return redirect()->route('posts.index');
            }
            elseif(is_numeric($request->input)) {
                return back()->with('message','phone in not valid');
            }
        }
        else{

            return back()->with('message','Please enter email or phone number in correct format');
        }


    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|unique:users|email',
            'phone_number'=>'required|digits:11',
            'password' => [Password::min(6)->letters()->numbers()]

        ]);

        $validated['password']=Hash::make($validated['password']);

        $user=User::create($validated);


        return redirect()->route('auth.login')->with('success', 'ٍثبت نام شما با موفقیت انجام شد');
    }
    public function logout() {
        auth()->logout();
        return redirect()
            ->route('auth.form.login');
    }
}
