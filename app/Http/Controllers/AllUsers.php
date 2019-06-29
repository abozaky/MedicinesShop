<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AllUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers = User::all();
         
        return view('dashboard/pages/users',compact('allusers'));
    }

     /**
     * Update User Status (approve - pending)
     * @param  int  $id , int $regstatus
     * @return \Illuminate\Http\Response
     */
   
    public function UpdateStatus($regstatus,$id)
    {
        
       $regstatus = ($regstatus == '0') ? $regstatus = '1' :  $regstatus = '0' ;
       $status = User::find($id);


       $status->RegStatus = $regstatus;
       $status->save();
       
      return redirect()->back()->with('success','User Status Updated By Admin');
    }

     /**
     * Update User Role(admin-user-pharmacist)
     */
    public function UpdateRole($role,$id)
    {
       

       switch ($role) {
           case '0':
               $role = '1';
               break;
           case '1':
               $role = '2';
               break;   
           
           default:
               $role = '0';
               break;
       }

       $uerRole = User::find($id);


       $uerRole->role = $role;
       $uerRole->save();
       
        return redirect()->back()->with('success','User Role Updated By Admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','User Deeleted By Admin');
    }
}
