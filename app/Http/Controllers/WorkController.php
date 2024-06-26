<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    //
    function index()
    {
        $work = Work::all();
        dd($work);
        return view('works.index');
    }
}
