<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function login(LoginRequest $credentials){
        $credentials = request()->only('email', 'password');
        
        if (Auth::attempt($credentials)){
            return redirect('dashboard/');
        }
        return redirect()->route('login.index')->with('login_status', 'La información ingresada no coincide con nuestros registros!');
    }
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        //$user = User::create($request->all());
        $user = User::create([
            'name' => $request['name'],
            'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);
        return redirect()->route('login.index')->with('login_success', 'Usuario registrado exitosamente.');
    }
}
