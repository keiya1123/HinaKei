<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    //
    function index()
    {
        $works = Work::all();
        // dd($works);
        return view('works.index', compact('works'));
    }
}
