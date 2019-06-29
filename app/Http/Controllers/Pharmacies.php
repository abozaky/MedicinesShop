<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use Auth;


class Pharmacies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdahsboard()
    {
        $allPharmacy = Pharmacy::all();
         
        return view('dashboard/pages/pharmacies',compact('allPharmacy'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('pages/Add_Your_Pharmacy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // first validation
         $request->validate(['pharmacy_name' => 'required',
                             'Address' => 'required',
                             'City' => 'required',
                             'DrMobile' => 'required|min:8',
                             'auth_id' => 'required']);

        // declare auth to check user register or not
        $user = Auth::user();

        if (! $user) {
            return redirect('/register')->with('faild','First Registation then You Can Add your Pharmacy');
        }
        // IT'S REGULAR WAY
        $Pharmacy = new Pharmacy();
        $Pharmacy->PharmacyName = $request->input('pharmacy_name');
        $Pharmacy->Address = $request->input('Address');
        $Pharmacy->City = $request->input('City');
        $Pharmacy->DrMobile = $request->input('DrMobile');
        $Pharmacy->auth_id = $request->input('auth_id');
        

        $user->Pharmacy()->save($Pharmacy);
        // $Pharmacy->save();

        return redirect('/')->with('success','Your Pharmacy added please wait to approve by Admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Pharmacy = Pharmacy::find($id);

        $Pharmacy->delete();
        return redirect()->back()->with('success','Pharmacy Deeleted By Admin');
    }
}
