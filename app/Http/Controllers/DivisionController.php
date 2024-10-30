<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function divisionStore(Request $request){
        $divisiondata = $request->validate([
        'division_name'=>'required|string|max:250'
        ]);
        //create new user
       $newdivision = Division::create($request->all());
        return redirect('division');
    }
    // Display Divisions
    public function show(){
        $divisiones= Division::all();
        return view("/Index.division", compact("divisiones")) ;//
        // return view("Division.division", compact("divisiones"));
        // $divisions= Division::with('categories')->get();
    }
    public function divisionedit(Division $division){

        // $division = Division::($division_id);
       return view('index.divisionUpdate',compact('division'));
     }
    //update
    public function update(Division $division, Request $request)
    {
         $divisiondata = $request->validate([
            'division_name' => 'required|string|max:250',
        ]);
    $divID = $division->division_id;

    $division123 = Division::findOrFail($divID);
    $division123->division_name = $request->division_name;
    $division123->save();

    return redirect()->route('division.show')->with('success', 'Division updated successfully');
    }
    // Delete the division
    public function destroy(Division $division)
    {
        // Delete the division
        $division->delete();

        return redirect()->route('division.show')->with('success', 'Division deleted successfully');
    }

    

    }
