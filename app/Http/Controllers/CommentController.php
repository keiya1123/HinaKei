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

    public function store(Request $request)
    {
        $work = Work::find($request->work_id);

        $comment = new Comment;
        $comment -> contents = $request -> contents;
        $comment -> user_id = Auth::id();
        $comment -> work_id = $request -> work_id;

        $comment -> save();

        return redirect()->route('works.show', $work->id);
    }

     //削除機能
    // function destroy(Request $request)
    // {
    // $comment = new Comment;
    // $comment -> comment_id = $request ->comment_id;
    // $comment -> user_id = Auth::id();
    // $comment = Comment::find($request->comment_id);
    // $comment -> contents = $request -> contents;

    // $comment -> delete();

    // return redirect() -> route('works.show', $comment->id);
    // }
}
