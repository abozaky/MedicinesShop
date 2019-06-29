<?php

namespace App\Http\Controllers;
use App\User;
use App\Articles;
use App\Comments;
use App\Categories;
use App\Orders;
use App\Medicine;
use App\Pharmacy;

use Auth;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $Count_Users       = User::all();
       $Count_Pharmacy    = Pharmacy::all();
       $Count_Medicines   = Medicine::all();
       $Count_Orders      = Orders::all();
       $Count_Articles    = Pharmacy::all();
       $Count_Comments    = Pharmacy::all();

       $All_Users       = User::take(3)->orderby('id','DESC')->get();
       $All_Pharmacy    = Pharmacy::take(3)->orderby('id','DESC')->get(); 
       $All_Medicine    = Medicine::take(3)->orderby('id','DESC')->get(); 
       $All_Orders      = Orders::take(3)->orderby('order_id','DESC')->get(); 
       $All_Article     = Articles::take(3)->orderby('article_id','DESC')->get();
       $All_Comments    = Comments::take(3)->orderby('comment_id','DESC')->get();

       
       return view('dashboard/pages/home',compact('Count_Users','Count_Pharmacy','Count_Medicines','Count_Orders','Count_Articles','Count_Comments','All_Users','All_Pharmacy','All_Medicine','All_Orders','All_Article','All_Comments'));
    }

  
}
