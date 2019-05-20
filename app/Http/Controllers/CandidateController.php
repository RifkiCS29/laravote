<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CandidateController extends Controller
{
    public function __construct(){
        $this-> middleware(function($request, $next){
            if (Gate::allows('manage-candidates')) return $next($request);

            abort(403,'Anda Tidak memiliki Hak Akses');
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = \App\Candidate::paginate(5);
        return view('candidates.index', ['candidates'=>$candidates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            "nama_ketua" => "required|min:5|max:100",
            "nama_wakil" => "required|min:5|max:100",
            "visi" => "required|min:10|max:1000",
            "misi" => "required|min:10|max:1000",
            "program_kerja" => "required|min:10|max:1000",
            "photo_paslon" => "required|image|mimes:jpg,jpeg,png|max:2000"
        ])->validate();

        $new_candidate = new \App\Candidate;
        $new_candidate->nama_ketua = $request->get('nama_ketua');
        $new_candidate->nama_wakil = $request->get('nama_wakil');
        $new_candidate->visi = $request->get('visi');
        $new_candidate->misi = $request->get('misi');
        $new_candidate->program_kerja = $request->get('program_kerja');

        if($request->file('photo_paslon')){
            $photo_paslon_path = $request->file('photo_paslon')->store('paslon','public');
            $new_candidate->photo_paslon = $photo_paslon_path;
        }

        $new_candidate->save();
        return redirect()->route('candidates.create')->with('status', 'candidate successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = \App\Candidate::findOrFail($id);
        return view('candidates.edit', ['candidate'=>$candidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),[
            "nama_ketua" => "required|min:5|max:100",
            "nama_wakil" => "required|min:5|max:100",
            "visi" => "required|min:10|max:1000",
            "misi" => "required|min:10|max:1000",
            "program_kerja" => "required|min:10|max:1000",
            "photo_paslon" => "image|mimes:jpg,jpeg,png|max:2000"
        ])->validate();

        $candidate = \App\Candidate::findOrFail($id);
        $candidate->nama_ketua = $request->get('nama_ketua');
        $candidate->nama_wakil = $request->get('nama_wakil');
        $candidate->visi = $request->get('visi');
        $candidate->misi = $request->get('misi');
        $candidate->program_kerja = $request->get('program_kerja');

        if($request->file('photo_paslon')){
            if($candidate->photo_paslon && file_exists(storage_path('app/public/'.$candidate->photo_paslon))){
                \Storage::delete('public/'.$candidate->photo_paslon);
            }
            $new_photo_paslon_path = $request->file('photo_paslon')->store('paslon','public');
            $candidate->photo_paslon = $new_photo_paslon_path;
        }

        $candidate->save();
        return redirect()->route('candidates.index')->with('status', 'Candidate Sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = \App\Candidate::findOrFail($id);
        $candidate->delete();
        if($candidate->photo_paslon && file_exists(storage_path('app/public/'.$candidate->photo_paslon))){
            \Storage::delete('public/'.$candidate->photo_paslon);
        }
        return redirect()->route('candidates.index')->with('status', 'candidate successfully Deleted');
    }
}
