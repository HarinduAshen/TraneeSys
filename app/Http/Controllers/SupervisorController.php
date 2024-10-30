<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor; // Assuming your model is named Supervisor

class SupervisorController extends Controller

{
    private static $mainSupType = '1'; // Config::get('constants.main_supervisor.academic');  // Adjust if needed

    /**
     * Save the given supervisor as a new entry
     * @param Request $request post request with data
     * @return View supervisor view redirection
     */
    public function storesupervisor(Request $request)
    {
        $supervisor = new Supervisor;
        $supervisor->name = $request->supervisorname;
        $supervisor->names = $request->supervisornames;
        $supervisor->save();

        return redirect()->back();
    }

    /**
     * Returns the view for supervisors with data
     * @return View supervisor view
     */
    public function viewdata()
    {
        $data = Supervisor::all();
        return view('pages.supervisor.supervisor')->with('data', $data);
    }

    /**
     * Delete given supervisor and returns the view for supervisors by a redirection
     * @param Number $id supervisor id to be deleted
     * @return View supervisor view
     */
    public function deletesupervisor($id)
    {
        $singledatarow = Supervisor::find($id);
        $singledatarow->delete();

        return redirect()->back();
    }

    /**
     * Returns the view for updating supervisors of given supervisor id
     * @param Number $id supervisor id to be updated
     * @return View supervisor update view
     */
    public function updatesupervisorview($id)
    {
        $singledatarow = Supervisor::find($id);
        return view('pages.supervisor.updatesupervisor')->with('singleuserdata', $singledatarow);
    }

    /**
     * Update given supervisor and returns the view for supervisors by a redirection
     * @param Request $request post request with supervisor data
     * @return View supervisor view
     */
    public function update(Request $request)
    {
        $id = $request->supervisorid;
        $supervisorname = $request->supervisorname;
        $supervisornames = $request->supervisornames;
        $singledatarow = Supervisor::find($id);
        $singledatarow->name = $supervisorname;
        $singledatarow->names = $supervisornames;
        $singledatarow->update();

        return redirect('/supervisor'); // Adjust redirect path as needed
    }

    // TODO :: move following functions to a new controller
    public function logoutfun()
    {
        // Implement logout functionality

        return view('pages.home');
    }

    // ////----buttons (These functions seem unrelated to supervisors and might need adjustments)
    public function deactiveuser($id)
    {
        return redirect()->back();
    }

    public function activeuser($id)
    {
        return redirect()->back();
    }
}
