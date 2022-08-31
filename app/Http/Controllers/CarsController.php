<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json([
            'cars' => $cars
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'registration_number' => 'integer|nullable',
            'is_registered' => 'string|nullable|max:255'
        ]);
        if($request->is_registered == "true" && !$request->registration_number){
            return response()->json([
                'error' => "Registration number is required!"
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], 400);
        }

        $car = new Car();

        $car->name = $request->name;
        $car->registration_number = $request->registration_number ? $request->registration_number : null;
        $car->is_registered = $request->is_registered == "true" ? '1' : '0';

        return $this->checkResponse($car->save());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return response()->json([
            'car' => $car
        ], 200);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'registration_number' => 'integer|nullable',
            'is_registered' => 'string|nullable|max:255'
        ]);
        if($request->is_registered == "true" && !$request->registration_number){
            return response()->json([
                'error' => "Registration number is required!"
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], 400);
        }

        $car = Car::find($id);

        $car->name = $request->name;
        $car->registration_number = $request->registration_number ? $request->registration_number : null;
        $car->is_registered = $request->is_registered == "true" ? '1' : '0';

        return $this->checkResponse($car->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        // Set null for car_id because car is deleted
        $parts = Part::where("id", $id)->get();

        foreach ($parts as $part) {
            $part->car_id = null;
            $part->save();
        }

        return $this->checkResponse($car->delete());
    }

    //methods
    private function checkResponse($data){
        if($data){
            return response()->json([
                'success' => "Succesfully executed"
            ], 200);
        }else{
            return response()->json([
                'error' => "Error not executed"
            ], 500);
        }
    }
}
