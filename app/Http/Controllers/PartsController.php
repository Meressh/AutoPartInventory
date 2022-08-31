<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::with('car')->get()->all();
        return response()->json([
            'parts' => $parts
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
        // Check string 'null'
        if($request->car_id == "null"){
            $request["car_id"] = null;
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'serialnumber' => 'required|integer',
            'car_id' => 'integer|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], 400);
        }

        $part = new Part();
        return $this->saveData($request, $part);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $part = Part::find($id);

        return response()->json([
            'part' => $part
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
        // Check string 'null'
        if($request->car_id == "null"){
            $request["car_id"] = null;
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'serialnumber' => 'required|integer',
            'car_id' => 'integer|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], 400);
        }

        $part = Part::find($id);
        return $this->saveData($request, $part);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);

        return $this->checkResponse($part->delete());
    }

    //Methods
     //methods
    private function saveData($request, $part){
        $part->name = $request->name;
        $part->serialnumber = $request->serialnumber;
        $part->car_id = $request->car_id ? (int)$request->car_id : null;

        return $this->checkResponse($part->save());
    }

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
