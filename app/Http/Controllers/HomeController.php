<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Guide;
use App\Models\onboarding;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      
        $totalguide = Guide::count();
        $totalunitkerja= UnitKerja::count();
       

        $loggedInUserId = Auth::id();
        $totalonboarding = onboarding::whereHas('participants', function ($query) use ($loggedInUserId) {
            $query->where('user_id', $loggedInUserId);
        })->count();

        return view('dashboard', compact('totaluser','totalguide', 'totalonboarding','totalunitkerja'));
    }
}
