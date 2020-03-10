<?php

namespace App\Http\Controllers;

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
        $candidates = \App\Candidate::with('users')->paginate(5);
        $jumlah = \App\User::where('status','SUDAH')->count();
        return view('pilihan.summary',compact('candidates','jumlah'));
    }
}
