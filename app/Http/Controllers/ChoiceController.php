<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChoiceController extends Controller
{
    public function __construct(){
        $this-> middleware(function($request, $next){
            if (Gate::allows('manage-pilihan')) return $next($request);

            abort(403,'Anda Tidak memiliki Hak Akses');
        });
    }
    
    public function pilihan()
    {
        $candidate = \App\Candidate::paginate(2);
        return view('pilihan.index', ['candidates'=>$candidate]);
    }

    public function pilih(Request $request, $id)
    {
        $id = Auth::user()->id;
        $user = \App\User::findOrFail($id);
       
        $user->candidate_id = $request->get('candidate_id');
        $user->status = "SUDAH";
        $user->save();
        return redirect()->route('candidates.pilihan')->with('status', 'You Have Been Choiched');
    }
}
