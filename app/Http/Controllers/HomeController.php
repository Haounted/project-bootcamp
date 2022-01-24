<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;

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
        $gender = User::where('id','=',Auth::user()->id)->first();
        $dashboards = User::all();
        $contents = Content::where('user_id',auth()->user()->id)->get();
        return view('dashboard',compact('dashboards','contents','gender'));
    }
}
