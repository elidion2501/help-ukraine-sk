<?php

namespace App\Http\Controllers\Api\v1\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CarStoreRequest;
use App\Http\Resources\Car\CarColletion;
use App\Models\Car;
use Illuminate\Http\Request;

class CarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::where('type', $request->type != 3 ? $request->type : 2)
        ->when($request->city_from_id, function ($query) use ($request) {
            return $query->where('city_from_id', $request->city_from_id);
        })
        ->when($request->take_from_borders, function ($query) use ($request) {
            return $query->where('take_from_borders', $request->take_from_borders);
        })
        ->when($request->city_to_id, function ($query) use ($request) {
            return $query->where('city_to_id', $request->city_to_id);
        })
        ->orderBy('created_at', 'desc')
        ->cursorPaginate(5);
        return response()->success(new CarColletion($cars));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        Car::create($request->validated());
        return response()->success('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
