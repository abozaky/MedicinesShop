<?php

namespace App\Http\Controllers;
use App\Comments;

use Illuminate\Http\Request;

class Comment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdashboard()
    {
            
         $All_Comments = Comments::all();
        return view('dashboard/pages/comments',compact('All_Comments'));    
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Comments = Comments::find($id);
        $Comments->delete();
        return redirect()->back()->with('success','Comments Deeleted By Admin');
    }
}
