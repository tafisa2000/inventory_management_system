<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function CategoryAll(){
         $category = Category::latest()->get();
        return view('backend.category.category_all',compact('category'));
        
    }

    public function CategoryAdd(){
     return view('backend.category.category_add');

    }

    public function CategoryStore(Request $request){
         Category::insert([
                'name' => $request->name,     
                'created_by' => Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);
        
         $notification = array (
            'message' => 'Category is inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }

    public function CategoryEdit($id){
          $category = Category::findOrFail($id);
        
        return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request){
         
        $category_id = $request->id;
        Category::findOrfail($category_id)->update([
                'name' => $request->name,
                'updated_by' => Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);
        
         $notification = array (
            'message' => 'Category is updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }


    public function CategoryDelete($id){
         
        Category::findOrFail($id)->delete();
         $notification = array (
            'message' => 'Category is deleted successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }
}