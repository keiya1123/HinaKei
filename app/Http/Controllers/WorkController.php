<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    //詳細ページ
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
        $work = new Work;
//あとで足すかも？
        $work -> title = $request -> title;
        $work -> body = $request -> body;
        $work -> user_id = Auth::id();

        $work -> save();

        return redirect()->route('works.index');
    }
}
