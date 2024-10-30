<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Division;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function addtrinee(){
    //     return view('Index.category');

    // }

    public function create()
    {
        $divisions= Division::all();
        $categories = Category::with('division')->get(); // Fetch all categories with their associated division
        return view('index.category', compact('divisions','categories'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'division_id'=>'required|exists:divisions,division_id',
            'type'=>'required|in:Special,General',
            'count'=>'required|integer|min:0'
        ]);

        // Create a new category with validated data
        Category::create([
            'division_id' => $request->division_id,
            'type' => $request->type,
            'count' => $request->count
        ]);
        return redirect("/create/new/cat");

    }



    // Update category edit page
    public function categoryedit(Category $category){

        $divisions = Division::all();
        return view('index.categoryUpdate',compact('category','divisions'));

    }



    public function categoryupdate(Request $request, Category $category)
    {
        $request->validate([
            'division_id' => 'required|exists:divisions,division_id',
            'type' => 'required|in:Special,General',
            'count' => 'required|integer|min:1'
        ]);

        // Update the category with validated data
        $category->update([
            'division_id' => $request->division_id,
            'type' => $request->type,
            'count' => $request->count
        ]);

        return redirect("/create/new/cat")->with('success', 'Category updated successfully');
    }

     // Delete category
     public function CategoryDestroy(Category $category)
     {
         $category->delete();
         return redirect("/create/new/cat")->with('success', 'Category deleted successfully');
     }
}
