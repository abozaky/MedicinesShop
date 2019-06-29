<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine_Pharmacy_View;
use App\Orders;
use App\Medicine;
use Auth;
use Carbon\Carbon;



class Book_Now extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdashboard()
    {
        $All_Orders = Orders::all();
         
        return view('dashboard/pages/orders',compact('All_Orders'));    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Update order Status (Confirm Order)
     */
   
    public function Update_Status_Orders($status,$id)
    {

       $Confirm_status = ($status == '0') ? $status = '1' :  $status = '0' ;

       $change_status = Orders::where('order_id', $id )->first();      

       $change_status->order_status = $Confirm_status;
       $change_status->save();
       
      
       
      return redirect()->back()->with('success','Order Confirm bY Pharmacy Owner');
    }

    public function index($id)

    {

        // to check Quantity after order_Canceled (Restor Quantity and Set it Zero )
        $timestamp = Carbon::now();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Africa/Cairo');

        $Orders = Orders::where('Medicine_id', $id )->get();

        
        $Med_Quant = Medicine::where('id', $id )->first();

        $Restore_Quant_OrderCancel = $Med_Quant['Quantity'];
        
        foreach ($Orders as $order ) {
            if ($date > $order['order_expired_deliver'] and $order['order_status'] == 0 ) {
                
              $Restore_Quant_OrderCancel += $order['Quantity'];
                


              $Set_Quantity = Orders::find($order['order_id']);

              $Set_Quantity->Quantity = 0;
              $Set_Quantity->total = 0;
              
              $Set_Quantity->save() ;
            }
            
        }               

         $Med_Quant->Quantity = $Restore_Quant_OrderCancel;
         $Med_Quant->save() ;


        ################# Display data at page ####################
        

        $Medicine_Info = Medicine_Pharmacy_View::where('id', $id )->get();
        
        return view('pages/Book_It_Now',compact('Medicine_Info','Orders'));
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
        
         $request->validate(['mobile' => 'required',
                             'card_number' => 'required',
                             'Quantity' => 'required']);

        
        $username = Auth::user()->name;
        $Medicine_id = $request->input('Medicine_id');
        $total_price = ($request->input('Quantity') * $request->input('price'));
        // date to deliver order (very important) Carbon Package
        $timestamp = Carbon::now();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Africa/Cairo');
       
        // IT'S REGULAR WAY to store data
        $Order = new Orders();
        
        $Order->order_name = $request->input('order_name');
        $Order->order_username = $username;
        $Order->mobile_user = $request->input('mobile');
        $Order->Quantity = $request->input('Quantity');
        $Order->Medicine_id = $Medicine_id;
        $Order->order_expired_deliver =  $date->now()->addMinutes(2);
        $Order->total = $total_price;
        
        $Order->save();

          // updat Quantity (total - quant) at medicine
        $Medicine_Quant = Medicine::find($request->input('Medicine_id'));

        $Quant_after_Confirm = ($Medicine_Quant->Quantity - $request->input('Quantity') );
       $Medicine_Quant->Quantity = $Quant_after_Confirm;
       $Medicine_Quant->save(); 

        return redirect()->route('BookNow', ['id' => $Medicine_id])->with('success','Your Order Done ... Please Wait to review By Pharmacy Owner');

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
           
        $Order = Orders::find($id);

        $Order->delete();
        return redirect()->back()->with('success','Order Deeleted By Pharmacy Owner');
    }
}
