<?php

namespace App\Http\Controllers\Backend\Seller\Auth;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:seller');
    }

    public function showRegistrationForm()
    {
        return view('backend.seller.auth.register');
    }

    protected function guard()
    {
        return Auth::guard('seller');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Seller::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $valideted = $this->validator($request->all())->validate();
        $seller = $this->create($valideted);
        $this->guard()->login($seller);
        return redirect()->route('seller.profile');
    }
}
