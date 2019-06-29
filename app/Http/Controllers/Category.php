<?php

namespace App\Http\Controllers;
use App\Categories;

use Illuminate\Http\Request;

class Category extends Controller
{

	 /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function indexdashboard()
    {
         $All_Categories = Categories::all();
        return view('dashboard/pages/categories',compact('All_Categories'));    
    }


     /**
     * add category form add_new_medicine page
     ** @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_category(Request $request)

    {
       
         // first Check category name exist or not
         // Add Category to table
        
        $Cate_name = Categories::where('Category_name', '=', $request->input('Category'))->first();

        if ($Cate_name === null) {
            $Category = new Categories();
            $Category->Category_name = $request->input('Category');
            $Category->save();
            return redirect()->back()->with('success','Category Added in (Choose Category)');
        }else{
            return redirect()->back()->with('Fail','This Category Already Exist');
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
        $Category = Categories::find($id);
        $Category->delete();
        return redirect()->back()->with('success','Category Deeleted By Admin');
    }
}
