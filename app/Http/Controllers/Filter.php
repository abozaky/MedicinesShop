<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\Pharmacy;
use App\Medicine_Pharmacy_View;




class filter extends Controller
{
   

     public function Medicinefilter($filter)
    {
        
       ## ------- This Way Using (view all table SQL) instead ORM --------- ##
          ## ------------ one query (category - City)-----------------##

        $Medicine_filter = Medicine_Pharmacy_View::where('Category_name', $filter )->orWhere('City', $filter)->orWhere('PharmacyName', $filter)->paginate(6);


        $Category_Filter = Medicine_Pharmacy_View::groupBy('Category_name')->get();
        $City_Filter     = Medicine_Pharmacy_View::groupBy('City')->get();

         $Pharmacy_Filter = Medicine_Pharmacy_View::groupBy('PharmacyName')->get();

         // return $Medicine_filter;
         return view('pages/medicines',compact('Medicine_filter','Category_Filter','City_Filter','Pharmacy_Filter'));

       ## ------------------------- This Way Used ORM (releation)------------- ##

        // // filter by category
        //  $All_Medicines = Medicine::with('Pharmacy')->where('Categories', $filter)->get();
        
        // // filter by City
        
        // $Filter_City = Pharmacy::with('medicine')->where('City', $filter)->get();
        

        // if ($All_Medicines->count() > 0) {
        
        //  return view('pages/medicines',compact('All_Medicines'));

        // }elseif ($Filter_City->count() > 0) {
            
        //  return view('pages/medicines',compact('Filter_City'));
        // }

     
    }


  public function FormSearch(Request $request)
    {
     
        
        // return $request;
        // filter by name (form search) 

        $search = $request->search ;

        if ($search != "") {
            
            $All_Medicines = Medicine::where('Medicine_Name', 'like', '%' . $search . '%')->paginate(6);

            $All_Medicines->appends(['search' => $request->search]);


             if ($All_Medicines->count() == 0) {
            
             return redirect('/medicines')->with('Fail','No data for this medicine .. Check your Medicine Name ');   
            }
                 $Category_Filter = Medicine_Pharmacy_View::groupBy('Category_name')->get();
                 $City_Filter     = Medicine_Pharmacy_View::groupBy('City')->get();

                 return view('pages/medicines',compact('All_Medicines','Category_Filter','City_Filter'));
            
        }else{

            return redirect()->back();
        }



    
     
    }


   
}
