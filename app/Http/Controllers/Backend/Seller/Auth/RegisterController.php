<?php

namespace App\Http\Controllers\Backend\Seller\Auth;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Country;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:seller');
    }

    public function showRegistrationForm()
    {
        if (Auth::guard('seller')->check()) {
            return redirect()->route('seller.dashboard');
        }
        $data['countries'] = Country::active()->select('id', 'name', 'slug')->orderBy('name')->get();
        return view('frontend.auth.seller.register', $data);
    }

    protected function guard()
    {
        return Auth::guard('seller');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'nullable|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'operation_area_id' => 'nullable|exists:operation_areas,id',
            'operation_sub_area_id'=> 'nullable|exists:operation_sub_areas,id',
            'hub_id' => 'required|exists:hubs,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|max:255|unique:sellers',
            'shop_name' => 'required|string|unique:sellers,shop_name',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Seller::create([
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'operation_area_id'=> $data['operation'],
            'operation_sub_area_id'=> $data['operation_sub_area'],
            'hub_id' => $data['hub'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'shop_name' => $data['shop_name'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {

        $valideted = $this->validator($request->all())->validate();
        $seller = $this->create($valideted);
        $this->guard()->login($seller);
        return redirect()->route('seller.dashboard');
    }
}
