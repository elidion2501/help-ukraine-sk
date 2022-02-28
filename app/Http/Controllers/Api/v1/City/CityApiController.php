<?php

namespace App\Http\Controllers\Api\v1\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\City\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;

class CityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::where('name', 'LIKE', "%{$request->body}%")->limit(10)->get();

        return response()->success(new CityCollection($cities));
    }
}
