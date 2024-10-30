<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\DegreeorcourseController;
use App\Http\Controllers\UniorinstituteController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\RegisteredUserController;

 Route::get('/', function () {
  return view('welcome');
}); 


Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/findtrainee', [TraineeController::class, 'findForm'])->name('trainees.findForm');
Route::post('/findtrainee', [TraineeController::class, 'findTrainee'])->name('trainees.findTrainee');
Route::get('/showtrainee/{registration_number}', [TraineeController::class, 'findTrainee'])->name('showtrainee');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//list

Route::get('/traineelist', [TraineeController::class, 'index1']);

//summary
Route::get('/trainee-summary', [TraineeController::class, 'showSummary'])->name('trainees.summary');

Route::get('/trainee-count', [TraineeController::class, 'traineeCount'])->name('trainee.count');

//pdf
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

// trainee


Route::get('/trainees', [TraineeController::class, 'index']);
Route::post('/trainees', [TraineeController::class, 'store']);
Route::get('/trainees/{id}/edit', [TraineeController::class, 'edit'])->name('trainees.edit');
Route::put('/trainees/{id}', [TraineeController::class, 'update'])->name('trainees.update');
Route::delete('/trainees/{id}', [TraineeController::class, 'destroy'])->name('trainees.delete');

Route::get('/edit/trainees/{id}', [TraineeController::class, 'edit'])->name('trainee.edit');
// Route::get('/trainees/edit/{id}', 'TraineeController@edit')->name('trainees.edit');
// Route::put('/trainees/update/{id}', 'TraineeController@update')->name('trainees.update');



// Route::get('/trainees', [TraineeController::class, 'index']);
// Route::post('/trainees', [TraineeController::class, 'store'])->name('trainees.store');
// Route::delete('/trainees/{id}', [TraineeController::class, 'destroy'])->name('trainees.delete');
// // Route::get('/trainees/edit/{id}', 'TraineeController@edit')->name('trainees.edit');
// // Route::put('/trainees/update/{id}', 'TraineeController@update')->name('trainees.update');
// //  Route::get('/updateduration/{id}', [DurationController::class, 'updatedurationview']);
// //         Route::post('/updatedata', [DurationController::class, 'update']);


//         //new
// Route::get('/updatetrainees/{id}', [TraineeController::class, 'updatetarineesview']);
// Route::post('/updatetrainees', [TraineeController::class, 'update']);



//home
Route::get('/dashbord', function () {
    return view('pages.home'); // assuming your Blade file is located at resources/views/page/home.blade.php
});


Route::get('/traineetask', function () {
    return view('pages.traineeform.traineetask'); // assuming your Blade file is located at resources/views/page/home.blade.php
});

// Route::get('/traineeform', function () {
//     return view('pages.traineeform.traineeform'); // assuming your Blade file is located at resources/views/page/home.blade.php
// });





    //degreeorcourse Routes
    Route::group(['as' => '.degreeorcourse'], function () {
        Route::get('/degree', [DegreeorcourseController::class, 'viewdata'])->name('degree.viewdata');
        Route::post('/savedeg', [DegreeorcourseController::class, 'storedeg'])->name('degree.storedeg');
        Route::post('/updatedegdata', [DegreeorcourseController::class, 'updatedegdata'])->name('degree.updatedegdata');
        Route::get('/deletedeg/{id}', [DegreeorcourseController::class, 'deletedeg'])->name('degree.deletedeg');
        Route::get('/updatedeg/{id}', [DegreeorcourseController::class, 'updatedegview'])->name('degree.updatedegview');
    });

    //Uniorinstitute Routes
    // Route::group(['as' => '.uniorinstitute'], function () {
        Route::get('/university', [UniorinstituteController::class, 'viewdata']);
        Route::post('/saveuniorinstitute', [UniorinstituteController::class, 'storeuni']);
        Route::get('/deleteuniorinstitute/{id}', [UniorinstituteController::class, 'deleteuniorinstitute']);
        Route::get('/updateuniorinstitute/{id}', [UniorinstituteController::class, 'updateuniorinstituteview']);
        Route::post('/updateunidata', [UniorinstituteController::class, 'update']);
    // });

      //duration
      Route::group(['as' => '.duration'], function () {
        Route::get('/duration', [DurationController::class, 'viewdata']);
        Route::post('/saveduration', [DurationController::class, 'store']);
        Route::get('/deleteduration/{id}', [DurationController::class, 'deleteduration']);
        Route::get('/updateduration/{id}', [DurationController::class, 'updatedurationview']);
        Route::post('/updatedata', [DurationController::class, 'update']);
    });

Route::group(['as' => '.supervisor'], function () {
    Route::get('/supervisor', [SupervisorController::class, 'viewdata']); // Adjust path if needed
    Route::post('/savesupervisor', [SupervisorController::class, 'storesupervisor']);
    Route::get('/deletesupervisor/{id}', [SupervisorController::class, 'deletesupervisor']);
    Route::get('/updatesupervisor/{id}', [SupervisorController::class, 'updatesupervisorview']);
    Route::post('/updatesupervisor', [SupervisorController::class, 'update']); // Adjust endpoint name if needed
});


// divison and category
Route::get('/division',[DivisionController::class,'show'])->name('division.show');
Route::post('/addtrainee',[DivisionController::class,'divisionStore'])->name('division.adddivision');
// Route::get('/category/add',[CategoryController::class,'addtrinee'])->name('category.add');
Route::get('/create/new/cat',[CategoryController::class,'create'])->name('category.create');
Route::post('/addcategorytrainee',[CategoryController::class,'CategoryStore'])->name('category.store');
// Division Update
Route::post('/divisions/{division}/edit', [DivisionController::class, 'divisionedit'])->name('division.editpage');
Route::post('/divisions/{division}', [DivisionController::class, 'update'])->name('division.update');

//Category Update
Route::get('/category/{category}/edit', [CategoryController::class, 'categoryedit'])->name('category.editpage');
Route::put('/categories/update/{category}', [CategoryController::class, 'categoryupdate'])->name('category.update');

//division Delete
Route::delete('/division/{division}', [DivisionController::class, 'destroy'])->name('division.destroy');
//Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


//Category Delete
Route::delete('/category/{category}', [CategoryController::class, 'CategoryDestroy'])->name('category.destroy');


// Trainee Details
//Route::get('/trainee-details', [TraineeController::class, 'traineeDetails'])->name('trainee.details');
Route::get('/trainee/details/{division_id}', [TraineeController::class, 'traineeDetails'])->name('trainee.details');
// Trainee Count
Route::get('/trainee-count', [TraineeController::class, 'traineeCount'])->name('trainee.count');

// University
Route::get('/universities', [UniorinstituteController::class, 'index'])->name('university');

// Duration
Route::get('/durations', [DurationController::class, 'index'])->name('duration');

// In web.php

//Route::get('/trainees/university/{id}', [TraineeController::class, 'getTraineesByUniversity']);
//Route::get('/trainees/duration/{id}', [TraineeController::class, 'getTraineesByDuration']);

Route::get('/trainee-summary', [TraineeController::class, 'showSummary'])->name('trainees.summary');

Route::get('/trainee/details/{division_id}', [TraineeController::class, 'traineeDetails'])->name('trainee.details');
Route::get('/trainee/count/{division_id}', [TraineeController::class, 'traineeCount'])->name('trainee.count');



// Route to display the duration selection page
Route::get('/duration/index', [DurationController::class, 'index'])->name('duration.index');

// Route to fetch trainees
Route::get('/get-trainees', [DurationController::class, 'getTrainees']);






/// Route to display the university selection page with division context
Route::get('/universities', [UniorinstituteController::class, 'getUniversities'])->name('universities.index');

// Route to fetch trainees based on university and division
Route::get('/get-trainees', [UniorinstituteController::class, 'getTrainees']);






require __DIR__.'/auth.php';
