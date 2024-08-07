<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //コメント機能
    public function create ($work_id)
    {
        $work = Work::find($work_id);
        return view('comments.create' , ['work'=>$work]);
    }

    //保存機能
    public function store(Request $request)
    {
        $work = Work::find($request->work_id);

        $request->validate([
            'contents' => 'required',
        ]);

        $comment = new Comment;
        $comment -> contents = $request -> contents;
        $comment -> user_id = Auth::id();
        $comment -> work_id = $request -> work_id;
        $comment ->save();

        return redirect()->route('works.show', $work->id);
    }
    
    //コメント削除機能

    public function destroy (Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    
}



}