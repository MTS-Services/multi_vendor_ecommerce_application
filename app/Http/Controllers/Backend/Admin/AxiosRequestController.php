<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\OperationArea;
use App\Models\OperationSubArea;
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
                'states' => $country->activeStates,
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
             $country = Country::with(['states','cities'])->withCount(['activeStates', 'activeCities'])->findOrFail($country_id);
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
             $state = State::with('activeCities')->findOrFail($state_id);
             return response()->json([
                 'cities' => $state->activeCities,
                 'message'=> "States fetched successfully!",
             ]);
        }
        return response()->json([
             'message'=> "Cities not found!",
         ]);
      }
      public function getHubs(Request $request): JsonResponse{
        $country_id = $request->country_id;
        $state_id = $request->state_id;
        $city_id = $request->city_id;
        $operation_area_id = $request->operation_area_id;
        $operation_sub_area_id = $request->operation_sub_area_id;
        if($country_id){
             $country = Country::with('activeHubs')->findOrFail($country_id);
             return response()->json([
                 'hubs' => $country->activeHubs,
                 'message'=> "Hubs fetched successfully!",
             ]);
        }
        if($state_id){
             $state = State::with('activeHubs')->findOrFail($state_id);
             return response()->json([
                 'hubs' => $state->activeHubs,
                 'message'=> "Hubs fetched successfully!",
             ]);
        }
        if($city_id){
             $city = City::with('activeHubs')->findOrFail($city_id);
             return response()->json([
                 'hubs' => $city->activeHubs,
                 'message'=> "City fetched successfully!",
             ]);
        }
        if($operation_area_id){
            $operation = OperationArea::with('activeHubs')->findOrFail($operation_area_id);
            return response()->json([
                "hubs"=> $operation->activeHubs,
                'message'=> "Hubs fetched successfully!",
            ]);
        }
        if($operation_sub_area_id){
            $operation = OperationSubArea::with('activeHubs')->findOrFail($operation_sub_area_id);
            return response()->json([
                "hubs"=> $operation->activeHubs,
                'message'=> "Hubs fetched successfully!",
            ]);
        }
        return response()->json([
             'message'=> "Hubs not found!",
         ]);
      }
      public function getOperationAreas(Request $request): JsonResponse{
        $city_id = $request->city_id;
        if($city_id){
             $city = City::with('activeOperationAreas')->findOrFail($city_id);
             return response()->json([
                 'operation_areas' => $city->activeOperationAreas,
                 'message'=> "States fetched successfully!",
             ]);
        }
        return response()->json([
             'message'=> "Operation areas not found!",
         ]);
      }
      public function getSubAreas(Request $request): JsonResponse{
        $area_id = $request->area_id;
        if($area_id){
             $area = OperationArea::with('activeOperationSubAreas')->findOrFail($area_id);
             return response()->json([
                 'operation_sub_areas' => $area->activeOperationSubAreas,
                 'message'=> "Sub areas fetched successfully!",
             ]);
        }
        return response()->json([
             'message'=> "Operation sub areas not found!",
         ]);
      }


       public function getSubCategories(Request $request): JsonResponse{

            $parent_id = $request->parent_id;
            if($parent_id){
                    $parent = Category::with('activeChildrens')->findOrFail($parent_id);
                    return response()->json([
                        'childrens' => $parent->activeChildrens,
                        'message'=> "Childrens fetched successfully!",
                    ]);
            }
            return response()->json([
                    'childrens' => [],
                    'message'=> "Childrens not found!",
                ]);
        }
    }
