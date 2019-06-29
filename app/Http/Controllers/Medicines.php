<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\Categories;
use App\Medicine_Pharmacy_View;
use Auth;



class Medicines extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdashboard()
    {
         $All_Medicines = Medicine::all();
         
        return view('dashboard/pages/medicines',compact('All_Medicines'));    
    }

    public function indexMedicines()
    {
         $All_Medicines   = Medicine::orderby('id','ASC')->paginate(6);
         $Category_Filter = Medicine_Pharmacy_View::groupBy('Category_name')->get();
         $City_Filter     = Medicine_Pharmacy_View::groupBy('City')->get();
         $Pharmacy_Filter = Medicine_Pharmacy_View::groupBy('PharmacyName')->get();
        return view('pages/medicines',compact('All_Medicines','Category_Filter','City_Filter','Pharmacy_Filter'));
    }


     public function AddYourMedicine()
    {
        //  to prevent URL Direction without validate by role (pharmacist or other)
         if (Auth::user()->role == 1 ) {
            
            $All_Categories = Categories::All();
            return view('pages/Add_Your_Medicine',compact('All_Categories'));
         }
            return redirect('/')->with('Fail','Please Wait For Your Pharmacy Confirmation by Admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_medicine(Request $request)
    {
        // first validation
       
        // return $request;
        $request->validate(['Medicine_name' => 'required',
                             'Medicine_desc' => 'required|max:100',
                             'Quantity' => 'required',
                             'Medicine_price' => 'required',
                             'Category' => 'required',
                             'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);

        
        $Medicine = new Medicine();
        $Medicine->Medicine_Name = $request->input('Medicine_name');
        $Medicine->description = $request->input('Medicine_desc');
        $Medicine->Medi_Category_id = $request->input('Category');
        $Medicine->Quantity = $request->input('Quantity');
        $Medicine->price = $request->input('Medicine_price');
        $Medicine->Pharmacy_id = $request->input('auth_id');
        
        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload_img_medicines'), $imageName);
            $Medicine->image = $imageName;
        }else{

            $Medicine->image = '';
        }

        $Medicine->save();
        return redirect('/medicines')->with('success','Your Medicine added');
    }
    
    public function destroy($id)
    {
        $Medicine = Medicine::find($id);       
        $Medicine->delete();
        return redirect()->back()->with('success','Pharmacy Deeleted By Admin');
    }
}
