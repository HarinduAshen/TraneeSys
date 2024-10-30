<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degreeorcourse;
use DB;
use \Config;

class DegreeorcourseController extends Controller
{
  private static $mainDivType = '1'; //Config::get('constants.main_division.academic');
  private static $subDivType = '1'; //Config::get('constants.sub_division.academic');

  /**
   * Returns uniorinstitute data
   */
  private function getFacultiesData()
  {
    return DB::table('uniorinstitutes')
      ->where('typefac', '=', static::$mainDivType)
      ->get();
  }

  /**
   * Save the given degreeorcourse as a new entry
   * @param Request $request post request with data
   * @return View degreeorcourse view redirection
   */
  public function storedeg(Request $request)
  {
    $Degreeorcourse = new Degreeorcourse;
    $Degreeorcourse->dname = $request->depname;
    $Degreeorcourse->dnames = $request->depnames;
    $Degreeorcourse->fid = $request->uniorinstituteSelect;
    $Degreeorcourse->type = static::$subDivType;
    $Degreeorcourse->save();

    return redirect()->back();
  }

  /**
   * Returns the view for degreeorcourses with data
   * @return View degreeorcourse view
   */
  public function viewdata()
  {
    $uniorinstitutes = $this->getFacultiesData();
    $data = Degreeorcourse::where('type', '=', static::$subDivType)->get();

    $deptdata = DB::table('degreeorcourses')
      ->join('uniorinstitutes', 'degreeorcourses.fid', '=', 'uniorinstitutes.id')
      ->where('type', '=', static::$subDivType)
      ->select('uniorinstitutes.name', 'degreeorcourses.*')
      ->orderby('order_id')
      ->get();

    return view('pages.degreeorcourses.degreeorcourse')
      ->with('task', $uniorinstitutes)
      ->with('degreeorcourses', $data)
      ->with('deptdata', $deptdata);
  }

  /**
   * Delete given degreeorcourse and returns the view for degreeorcourses by a redirection
   * @param Number $id degreeorcourse id to be deleted
   * @return View degreeorcourse view
   */
  public function deletedeg($id)
  {
    $sindgledatarow = Degreeorcourse::find($id);
    $sindgledatarow->delete();

    return redirect()->back();
  }

  /**
   * Rreturns the view for updating degreeorcourses of given degreeorcourse id
   * @param Number $id degreeorcourse id to be updated
   * @return View degreeorcourse update view
   */
  public function updatedegview($id)
  {
    $uniorinstitutes = $this->getFacultiesData();
    $degreeorcourse = Degreeorcourse::find($id);
    $fname = DB::table('uniorinstitutes')->select('id', 'name')->where('id', $degreeorcourse['fid'])->get();
    return view('pages.degreeorcourses.updatedeg')->with('singleuserdata', $degreeorcourse)->with('task', $uniorinstitutes)->with('fname', $fname);
  }

  /**
   * Update given degreeorcourse and returns the view for degreeorcourses by a redirection
   * @param Request $request post request with degreeorcourse data
   * @return View degreeorcourse view
   */
  public function updatedegdata(Request $request)
  {
    $id = $request->degreeid;
    $uniorinstitutename = $request->uniorinstituteSelect;
    $degreename = $request->degreename;
    $degreenames = $request->depnames;
    $sindgledatarow = Degreeorcourse::find($id);
    $sindgledatarow->id = $id;
    $sindgledatarow->fid = $uniorinstitutename;
    $sindgledatarow->dname = $degreename;
    $sindgledatarow->dnames = $degreenames;
    $sindgledatarow->update();

    return redirect("/degree");
  }
}
