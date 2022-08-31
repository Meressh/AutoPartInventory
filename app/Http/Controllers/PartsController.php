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
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'serialnumber' => 'required|integer',
            'car_id' => 'integer|nullable'
        ]);

        $part = new Part();
        $part->name = $request->name;
        $part->serialnumber = (int)$request->serialnumber;
        $part->car_id = $request->car_id ? (int)$request->car_id : null;

        if($part->save()){
            return response()->json([
                'success' => "Succesfully saved"
            ], 200);
        }else{
            return response()->json([
                'success' => "Error not saved"
            ], 400);
        }
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
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'serialnumber' => 'required|integer',
            'car_id' => 'integer|nullable'
        ]);

        // Check string 'null'
        if($request->car_id == 'null'){
            $request->car_id = null;
        }

        $part = Part::find($id);
        $part->name = $request->name;
        $part->serialnumber = $request->serialnumber;
        $part->car_id = $request->car_id ? (int)$request->car_id : null;
        $part->save();

        if($part->save()){
            return response()->json([
                'success' => "Succesfully saved"
            ], 200);
        }else{
            return response()->json([
                'success' => "Error not saved"
            ], 400);
        }
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
        $part->delete();

        if($part->delete()){
            return response()->json([
                'success' => "Succesfully deleted"
            ], 200);
        }else{
            return response()->json([
                'success' => "Error not deleted"
            ], 400);
        }
    }
}
