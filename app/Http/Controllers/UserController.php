<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

      //show register/create form
    public function register(){
        return view('users.register');
    }

    
    public function store(Request $request){
        $formFields=$request->validate([
             'name'=>'required',
             'email'=>['required','email',Rule::unique('users','email')],
             'password'=>['required','min:6','confirmed']
        ]);
        //Hash Password
        $formFields['password']=bcrypt( $formFields['password']);


        //Create the new user
        $user = User::create($formFields);

        //Login the new user directly
        auth()->login($user);


        //redirect or return
        return redirect(url('/'))->with('message','User created and logged in');
    }


    //Show Login Form
    public function login(){    //1 step

        return view('users.login');
  
    }

    //store user data
    public function authenticate(Request $request){

        $formFields= $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();


            return redirect(url('/'))->with('message','You are now logged in!');
        }

        return back()->withErrors(['email'=>'inavalid Credentials'])->onlyInput('email');

    }

      //Logout User
    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(url('/login'))->with('message','You have been logged out!');

    }
    
}
