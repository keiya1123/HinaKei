<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    //一覧ページ
    function index()
    {
        $works = Work::all();
        // dd($works);
        return view('works.index', compact('works'));
    }

    //新規作成ページ
    function create()
    {
        return view('works.create');
    }

    //保存機能
    function store(Request $request)
    {
        // dd($request);
        //$requestに入っている値を、new Postでデータベースに保存するという記述
        $work = new Work;

        $work -> title = $request -> title;
        $work -> contents = $request -> contents;
        $work -> image_at = $request -> image_at;
        $work -> user_id = Auth::id();

        $work -> save();

        return redirect()->route('works.index');
    }


    //詳細ページ
    function show($id)
    {
        // dd($id);
        $work = Work::find($id);

        return view('works.show', ['work'=>$work]);
    }

    //編集機能
    function edit($id)
    {
        $work = Work::find($id);
        return view('works.edit', ['work'=>$work]);
    }

    //更新機能
    function update(Request $request, $id)
    {
        $work = Work::find($id);

        $work -> title = $request -> title;
        $work -> contents = $request -> contents;
        $work -> save();

        return view ('works.show', ['work' => $work]);
    }

    //削除機能
    function destroy($id)
    {
        $work = Work::find($id);

        $work -> delete();

        return redirect() -> route('works.index');
    }
}
//
