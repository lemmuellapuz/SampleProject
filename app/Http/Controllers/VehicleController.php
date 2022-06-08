<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::get(); //RETURNS ARRAY

        return view('child.dashboard', compact('vehicles'));
    }

    public function create_vehicle(){
        return view('child.create_vehicle');
    }

    public function edit_vehicle($id){
        
        $vehicle = Vehicle::where('id', $id)->first();
        //GET = RETURNS COLLECTION []
        //FIRST = array[0]

        return view('child.update_vehicle', compact('vehicle'));
    }

    public function add(Request $request) {

        try {
            
            $this->validate($request,[
                'vehicle_name' => 'required',
                'plate_number' => 'required'
            ]);
            
            //ADDING DATA TO TABLE
            Vehicle::create([
                'name' => $request->vehicle_name,
                'plate_number' => $request->plate_number
            ]);
            
            return response()->json([
                'message' => 'Vehicle created successfully'
            ], 200);

        }
        catch (ValidationException $exception) {
            return response()->json([
                'title' => 'Validation error',
                'errors' => $exception->errors(),
            ], 422);
        }
        catch (\Throwable $th) {
            return response()->json([
                'title' => 'Internal server error',
                'errors' => $th->getMessage()
            ], 500);
        }
        
    }

    // 200 = OK
    // 401/403 = UNAUTHORIZED
    // 422 = VALIDATION ERROR? 
    // 500 = INTERNAL SERVER ERROR

    public function update(Request $request) {

        try {
            $this->validate($request,[
                'vehicle_name' => 'required|min:6',
                'plate_number' => 'required'
            ]);
            
            Vehicle::where('id', $request->id)
            ->update([
                'name' => $request->vehicle_name,
                'plate_number' => $request->plate_number
            ]);
    
            return 'success';
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function delete($id) {

        Vehicle::where('id', $id)->delete();

        return redirect()->back();

    }

}
