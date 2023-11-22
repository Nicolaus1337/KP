<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Guide;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totaluser = User::count();
        $totalcontent = Content::count();
        $totalguide = Guide::count();
        $totalunitkerja= UnitKerja::count();

        return view('dashboard', compact('totaluser','totalguide', 'totalcontent','totalunitkerja'));
    }
}
