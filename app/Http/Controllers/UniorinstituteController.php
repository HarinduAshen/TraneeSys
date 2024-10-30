<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uniorinstitute;
use App\Models\Traineeform;
use App\Models\LoginAcd;
use Config;

class UniorinstituteController extends Controller
{
    private static $mainDivType = '1'; // Config::get('constants.main_division.academic');

    /**
     * Save the given uniorinstitute as a new entry
     * @param Request $request post request with data
     * @return View uniorinstitute view redirection
     */
    public function storeuni(Request $request)
    {
        $uniorinstitute = new Uniorinstitute;
        $uniorinstitute->name = $request->uniorinstitutename;
        $uniorinstitute->names = $request->uniorinstitutenames;
        $uniorinstitute->save();

        return redirect()->back();
    }

    /**
     * Returns the view for uniorinstitutes with data
     * @return View uniorinstitute view
     */
    public function viewdata()
    {
        $data = Uniorinstitute::where('typefac', '=', static::$mainDivType)->get();
        return view('pages.uniorinstitute.uniorinstitute')->with('uniorinstitutes', $data);
    }

    /**
     * Delete given uniorinstitute and returns the view for uniorinstitutes by a redirection
     * @param Number $id uniorinstitute id to be deleted
     * @return View uniorinstitute view
     */
    public function deleteuniorinstitute($id)
    {
        $uniorinstitute = Uniorinstitute::find($id);
        $uniorinstitute->delete();

        return redirect()->back();
    }

    /**
     * Returns the view for updating uniorinstitutes of given uniorinstitute id
     * @param Number $id uniorinstitute id to be updated
     * @return View uniorinstitute update view
     */
    public function updateuniorinstituteview($id)
    {
        $uniorinstitute = Uniorinstitute::find($id);
        return view('pages.uniorinstitute.updateuniorinstitute')->with('singleuserdata', $uniorinstitute);
    }

    /**
     * Update given uniorinstitute and returns the view for uniorinstitutes by a redirection
     * @param Request $request post request with uniorinstitute data
     * @return View uniorinstitute view
     */
    public function update(Request $request)
    {
        $id = $request->uniorinstituteid;
        $uniorinstitutename = $request->uniorinstitutename;
        $uniorinstitutenames = $request->uniorinstitutenames;

        $uniorinstitute = Uniorinstitute::find($id);
        $uniorinstitute->name = $uniorinstitutename;
        $uniorinstitute->names = $uniorinstitutenames;
        $uniorinstitute->save();

        return redirect('/university');
    }

    // TODO :: move following functions to a new controller
    public function logoutfun()
    {
        if (session()->has('logdata')) {
            session()->forget('logdata');

            return view('pages.home');
        } else {
            return view('pages.login');
        }
    }

    public function getUniversities()
    {
        // Fetch the universities
        $universities = Uniorinstitute::all(); // Assuming 'Uniorinstitute' is your model for universities
    
        // Pass the universities to the view
        return view('pages.uniorinstitute.index', compact('universities'));
    }
    
     
    public function getTrainees(Request $request)
{
    $universityId = $request->query('university_id');
    $divisionId = $request->query('division_id');

    // Assuming Trainee is a model that has university and division relationships
    $trainees = Traineeform::where('university_id', $universityId)
                        ->where('division_id', $divisionId)
                        ->get();

    return response()->json($trainees);
}

}
