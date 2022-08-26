<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index(){
        $data=[];
        if(\Auth::check()){
            $user=\Auth::user();
            $tweets=$user->feed_tweets()->orderBy('created_at','desc')->paginate(10);
            $categories=['Ruby','Laravel','Python'];
            $data=['user'=>$user,'tweets'=>$tweets,'categories'=>$categories];
        }
        return view('welcome',$data);
    }
    
    public function store(Request $request){
        $request->validate(['content'=>'required|max:255']);
        
        $request->user()->tweets()->create(['content'=>$request->content]);
        
        //  リクエスト元の投稿フォームに戻る
        return back();
    }
    
    public function destroy($id){
        
        $tweet=\App\Tweet::findOrFail($id);
        
        if(\Auth::id()===$tweet->user_id){
            $tweet->delete();
        }
        
        return back();
        
    }
    
}
