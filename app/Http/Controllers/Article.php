<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Comments;
use App\Categories;
use Gate;
use Auth;

class Article extends Controller
{

    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
     public function indexdashboard()
    {
         $All_Articles = Articles::all();
        return view('dashboard/pages/articles',compact('All_Articles'));    
    }

     /**
     * Update Article Status dashboard (approve - pending)
     * @param  int  $id , int $regstatus
     * @return \Illuminate\Http\Response
     */
   
    public function UpdateStatus($regstatus,$id)
    {
        
       $regstatus = ($regstatus == '0') ? $regstatus = '1' :  $regstatus = '0' ;
       $status = Articles::find($id);
       $status->article_status = $regstatus;
       $status->save();  
       return redirect()->back()->with('success','Article Status Updated By Admin');
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_dashboard($id)
    {
        $Delete_Article = Articles::find($id);

        $Delete_Article->delete();
        return redirect()->back()->with('success','Article Deeleted By Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function AddYourArticle()
    {    
             $All_Categories = Categories::All();
            return view('pages/Add_Your_Article',compact('All_Categories'));   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $All_Articles  = Articles::orderby('created_at','DESC')->paginate(10);
        return view('pages/healthinfo',compact('All_Articles'));
    }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_single_article($id,$cat_id)
    {
       
        $Single_Article  = Articles::find($id);

        $All_Comments  = Comments::where('comment_article_id',$id)->get();

        $Releated_Article = Articles::where('Arti_Category_id', $cat_id )->get();

        return view('pages/single_article',compact('Single_Article','All_Comments','Releated_Article'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Add_New_Comment(Request $request)
    {

         $request->validate(['comment_desc' => 'required'
                             ]);

        $comment = new Comments();
        $comment->comment_descreption = $request->input('comment_desc');
        $comment->comment_article_id = $request->input('article_id');
        $comment->comment_user_id = Auth::user()->id ;
        $comment->save();
        return redirect()->back()->with('success','Your Comment Added');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // return $request;
        // must be pharmasist to can add article
        if (Auth::user()->role != 1) {

            return redirect()->back()->with('fail','You Must Be have Pharmacy Before Add Article');
        }
        // first validation

        $request->validate(['Article_name' => 'required',
                             'Article_desc' => 'required|min:500',
                             'Category' => 'required',
                             'Article_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);


        $Article = new Articles();
        $Article->article_title = $request->input('Article_name');
        $Article->article_descreption = $request->input('Article_desc');
        $Article->Arti_Category_id = $request->input('Category');
        $Article->article_user_id = $request->input('auth_id');
        
        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('Article_image')) {
            $imageName = time().'.'.request()->Article_image->getClientOriginalExtension();
            request()->Article_image->move(public_path('upload_img_medicines'), $imageName);
            $Article->article_image = $imageName;
        }else{

            $Article->article_image = '';
        }

        $Article->save();

        return redirect('/HealthInformation')->with('success','Your Article Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $All_Categories = Categories::All();

        $Edit_Article = Articles::find($id);
        
        if (Gate::denies('manipulate', $Edit_Article)) {
            return redirect()->back()->with('Fail','You don\'have premessions');
        }
        return view('pages/Add_Your_Article',compact('Edit_Article','All_Categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        

        $request->validate(['Article_name' => 'required',
                             'Article_desc' => 'required|min:500',
                             'Category' => 'required',
                             'Article_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'   ]);

        $Article = Articles::find($id);
        $Article->article_title = $request->input('Article_name');
        $Article->article_descreption = $request->input('Article_desc');
        $Article->Arti_Category_id = $request->input('Category');
        $Article->article_user_id = $request->input('auth_id');
        
        // condition to check image is exist or not -> " nulable "
        if ($request->hasfile('Article_image')) {
            $imageName = time().'.'.request()->Article_image->getClientOriginalExtension();
            request()->Article_image->move(public_path('upload_img_medicines'), $imageName);
            $Article->article_image = $imageName;
        }else{

            $Article->article_image = '';
        }

        $Article->save();
        return redirect("/HealthInformation/article=$id/CatId=$request->input('Category')")->with('success','Your Article Edited');
    }

    
    public function Like($Like,$id)
    {
     
           
         $Article_like = Articles::find($id);
         $Article_like->article_like = ($Like+1);  

         $Article_like->save();
       
         return redirect()->back();
        // return redirect("/HealthInformation/article=$id")->with('success','Your Article Edited');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete_Article = Articles::find($id);

         if (Gate::denies('manipulate', $Delete_Article)) {
            return redirect()->back()->with('fial','You don\'have premessions');
        }

        $Delete_Article->delete();
        return redirect('/HealthInformation')->with('success','Article Deeleted By Owner');
    }
}
