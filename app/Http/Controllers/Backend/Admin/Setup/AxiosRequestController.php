<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\assertIsNotArray;


class AxiosRequestController extends Controller
{
     public function getStates(Request $request): JsonResponse{

       $country_id = $request->country_id;
       if($country_id){
            $country = Country::with('states')->findOrFail($country_id);
            return response()->json([
                'states' => $country->states->active(),
                'message'=> "States fetched successfully!",
            ]);
       }
       return response()->json([
            'states' => [],
            'message'=> "States not found!",
        ]);
     }

     public function getStatesOrCities(Request $request): JsonResponse{

        $country_id = $request->country_id;
        if($country_id){
             $country = Country::with(['states.cities'])->withCount(['activeStates', 'activeCities'])->findOrFail($country_id);
             if($country->active_states_count > 0){
                return response()->json([
                    'states' => $country->activeStates,
                    'message'=> "States fetched successfully!",
                ]);
             }
             if($country->active_cities_count > 0){
                 return response()->json([
                     'cities' => $country->activeCities,
                     'message'=> "Cities fetched successfully!",
                 ]);
             }
        }
        return response()->json([
             'message'=> "States or Cities not found!",
         ]);
      }

      public function getCities(Request $request): JsonResponse{
        $state_id = $request->state_id;
        if($state_id){
             $state = State::with('cities')->findOrFail($state_id);
             return response()->json([
                 'cities' => $state->activeCities,
                 'message'=> "States fetched successfully!",
             ]);
        }
        return response()->json([
             'message'=> "Cities not found!",
         ]);
      }
}
