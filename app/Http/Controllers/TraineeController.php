<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traineeform;
use App\Models\Duration;
use App\Models\Uniorinstitute;
use App\Models\Degreeorcourse;
use App\Models\Supervisor;
use App\Models\Category;
use App\Models\Division;
use Illuminate\Support\Facades\Storage;

class TraineeController extends Controller

{


    public function findForm()
    {
        
        return view('pages.traineeform.findtrainee');
    }
    
    public function findTrainee(Request $request, $registration_number = null)
{
    if ($registration_number) {
        $trainee = Traineeform::where('registration_number', $registration_number)->first();
    } else {
        $request->validate([
            'registration_number' => 'required|string|max:255',
        ]);
        $trainee = Traineeform::where('registration_number', $request->registration_number)->first();
    }

    if (!$trainee) {
        return redirect()->back()->with('error', 'Trainee not found.');
    }

    return view('pages.traineeform.showtrainee', compact('trainee'));
}

    


    
    public function index()
    {
        $trainees = Traineeform::all();
        $durations = Duration::all();
        $universities = Uniorinstitute::all();
        $degrees = Degreeorcourse::all();
        $supervisors = Supervisor::all();
        $divisions = Division::all();

        return view('pages.traineeform.traineeform', compact('trainees', 'durations', 'universities', 'degrees', 'supervisors','divisions'));
    }



    public function index1()
    {
        $trainees = Traineeform::all();
        $durations = Duration::all();
        $universities = Uniorinstitute::all();
        $degrees = Degreeorcourse::all();
        $supervisors = Supervisor::all();
        $divisions = Division::all();
        $trainees = Traineeform::with('division')->get();

        return view('pages.traineeform.traineelist', compact('trainees', 'durations', 'universities', 'degrees', 'supervisors','divisions'));
    }

    public function destroy($id)
    {
        $trainee = Traineeform::find($id);
        if (!$trainee) {
            return redirect()->back()->with('error', 'Trainee not found.');
        }

        $trainee->delete();

        return redirect()->back()->with('success', 'Trainee deleted successfully.');
    }

    public function create()
    {
        $durations = Duration::all();
        $universities = Uniorinstitute::all();
        $degrees = Degreeorcourse::all();
        $supervisors = Supervisor::all();
        $divisions = Division::all();
        return view('trainee.create', compact('durations', 'universities', 'degrees', 'supervisors','divisions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'registration_number' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'start_date' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'nic' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255',
            'end_date' => 'required|date',
            'duration_id' => 'required|exists:durations,id',
            'university_id' => 'required|exists:uniorinstitutes,id',
            'degree_id' => 'required|exists:degreeorcourses,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'division_id' => 'required|exists:divisions,division_id',
            
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trainee_images','public');
            $validated['image'] = $path;
        }

        
        
        Traineeform::create($validated);

        return redirect()->back()->with('success', 'Trainee details saved successfully.');
    }

    public function edit($id)
    {
        $trainee = Traineeform::find($id);
        if (!$trainee) {
            return redirect()->back()->with('error', 'Trainee not found.');
        }
    
        $durations = Duration::all();
        $universities = Uniorinstitute::all();
        $degrees = Degreeorcourse::all();
        $supervisors = Supervisor::all();
        $divisions = Division::all();
    
        return view('pages.traineeform.updatetraineeform', compact('trainee', 'durations', 'universities', 'degrees', 'supervisors','divisions'));
    }
    

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'birthday' => 'required|date',
        'registration_number' => 'required|string|max:255',
        'gender' => 'required|in:male,female,other',
        'start_date' => 'required|date',
        'phone_number' => 'required|string|max:15',
        'nic' => 'required|string|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|string|email|max:255',
        'end_date' => 'required|date',
        'duration_id' => 'required|exists:durations,id',
        'university_id' => 'required|exists:uniorinstitutes,id',
        'degree_id' => 'required|exists:degreeorcourses,id',
        'supervisor_id' => 'required|exists:supervisors,id',
        // Ensure image validation
    ]);

    $trainee = Traineeform::find($id);
    if (!$trainee) {
        return redirect('/trainees')->with('error', 'Trainee not found.');
    }

    $data = $request->all();

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($trainee->image) {
            Storage::delete('public/' . $trainee->image);
        }
        $path = $request->file('image')->store('trainee_images', 'public');
        $data['image'] = $path;
    }

    $trainee->fill($data);
    $trainee->save();

    return redirect('/trainees')->with('success', 'Trainee details updated successfully.');
}

public function showSummary(Request $request)
{
    $currentDate = \Carbon\Carbon::now();
    $divisions = Division::all(); // Fetch divisions

    // Initialize queries
    $studentsCurrentlyTrainingQuery = Traineeform::query();
    $generalStudentsCountQuery = Category::where('type', 'General');
    $specialStudentsCountQuery = Category::where('type', 'Special');

    // Check if a division_id is present in the request
    if ($request->filled('division_id')) {
        $division_id = $request->division_id;

        // Filter trainees by division_id
        $studentsCurrentlyTrainingQuery->where('division_id', $division_id);
        $generalStudentsCountQuery->where('division_id', $division_id);
        $specialStudentsCountQuery->where('division_id', $division_id);
    }

    // Get counts
    $studentsCurrentlyTraining = $studentsCurrentlyTrainingQuery->where('end_date', '>=', $currentDate)->count();
    $generalStudentsCount = $generalStudentsCountQuery->sum('count');
    $specialStudentsCount = $specialStudentsCountQuery->sum('count');

    return view('pages.traineeform.traineeSummery', compact('studentsCurrentlyTraining', 'generalStudentsCount', 'specialStudentsCount', 'divisions'));
}



public function show($id)
{
    $trainee = traineeform::with(['university', 'degree', 'supervisor', 'duration'])->find($id);

    if (!$trainee) {
        return redirect()->back()->with('error', 'Trainee not found');
    }

    return view('trainee.show', compact('trainee'));
}

public function traineeDetails($division_id)
{
    $trainees = Traineeform::where('division_id', $division_id)->get();
    return view('pages.traineeform.traineeDetails', compact('trainees'));
}


public function traineeCount($division_id)
{
    $currentDate = \Carbon\Carbon::now();
    $studentsCurrentlyTraining = Traineeform::where('division_id', $division_id)
                                            ->where('end_date', '>=', $currentDate)->count();
    $generalStudentsCount = Category::where('division_id', $division_id)->where('type', 'General')->sum('count');
    $specialStudentsCount = Category::where('division_id', $division_id)->where('type', 'Special')->sum('count');

    return view('pages.traineeform.traineeCount', compact('studentsCurrentlyTraining', 'generalStudentsCount', 'specialStudentsCount'));
}


// In TraineeController.php

public function byUniversity(Request $request)
{
    $university_id = $request->query('university_id');
    $division_id = $request->query('division_id');

    // Fetch trainees based on university_id
    $trainees = Traineeform::where('university_id', $university_id)->get(); // Adjust according to your DB schema

    return view('pages.trainees.index', compact('trainees', 'division_id'));
}


   
public function showDurationSelection(Request $request)
{
    // Get the selected division ID from the request
    $divisionId = $request->input('division_id');
    
    // Fetch available durations from the database
    $durations = Duration::all();

    // Pass the durations and divisionId to the view
    return view('pages.duration.index', compact('durations', 'divisionId'));
}

public function listTrainees(Request $request)
{
    // Get the division ID and duration ID from the request
    $divisionId = $request->input('division_id');
    $durationId = $request->input('duration_id');

    // Validate that both IDs are provided
    if (!$divisionId || !$durationId) {
        return redirect()->back()->with('error', 'Please select both division and duration.');
    }

    // Fetch trainees based on the selected division and duration
    $trainees = Traineeform::where('division_id', $divisionId)
                        ->where('duration_id', $durationId)
                        ->get();

    // Pass the trainees to the list view
    return view('pages.duration.index', compact('trainees', 'divisionId', 'durationId'));
}



    





}
