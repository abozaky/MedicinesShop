<?php

namespace App\Http\Controllers;
use App\AboutUs;

use App\Articles;

use Illuminate\Http\Request;

use Mail;

class HoemPages extends Controller
{

    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function indexHomePage()
    {
        
        $latest_Article  = Articles::take(3)->orderby('article_id','DESC')->get();
        

        return view('pages/index',compact('latest_Article'));
    }

   /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function indexAboutUSPage()
    {
        $about_us = AboutUs::all()->first();

        return view('pages/about',compact('about_us'));
    }
 /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function DashboardAboutUSPage()
    {
         $about_us = AboutUs::all()->first();
        return view('dashboard/pages/about_us',compact('about_us'));
    }

   /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function indexContactUSPage()
    {
         
        return view('pages/contact');
    }

    

    /**
     * Send Mail from Form Contact-Us Page the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SendMail( Request $request )
    {
    
        $request->validate(['Name' => 'required|max:30',
                            'Subject' => 'required|max:30',
                            'Email' => 'required',
                            'Phone' => 'required|min:11',
                            'Message' => 'required|max:500',
               
           ]);

        Mail::send('pages.email',
               array(
                   'name'   => $request->get('Name'),
                   'Email'  => $request->get('Email'),
                   'Subject'=> $request->get('Subject'),
                   'Phone'  => $request->get('Phone'),
                   'Message'=> $request->get('Message')
               ), function($message)
           {
               $message->from("User_ContactUs@medicine.com");
               $message->to('abdo.zaky0@medicine.com', 'Admin')->subject("Contact_US");
           });

      return back()->with('success', 'Thanks for contacting us!'); 

     
    }
       
     
     /**
     * Store the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        // return $request;

        $request->validate(['About_Us' => 'required|min:500']);

        $About = new AboutUs();
        $About->About_Us_descreption = $request->input('About_Us');
        $About->save();
        return redirect('/about');
       
     
    }
     
   

     /**
     * Remove About-Us from dashboard the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)

    {
        $about = AboutUs::find($id);
        $about->delete();
        return redirect()->back()->with('success','About Us Deeleted By Admin');
    }

}
