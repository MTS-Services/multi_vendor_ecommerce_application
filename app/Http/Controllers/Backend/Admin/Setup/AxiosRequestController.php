<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;


class AxiosRequestController extends Controller
{
     public function getStates(Request $request){

       $country_id = $request->country_id;
       if($country_id){
            $country = Country::with('states')->findOrFail($country_id);
            return response()->json([
                'states' => $country->states,
                'message'=> "States fetched successfully!",
            ]);
       }
       return response()->json([
            'states' => [],
            'message'=> "States not found!",
        ]);
     }
}
