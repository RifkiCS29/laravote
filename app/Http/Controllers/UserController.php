<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct(){
        $this-> middleware(function($request, $next){
            if (Gate::allows('manage-users')) return $next($request);

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
        if(request()->ajax()) {
            $users = \App\User::query();
            return DataTables::of($users)
                ->addColumn('action', function ($users) {
                    return view('users.action', [
                        'users' => $users,
                        'url_edit' => route('users.edit', $users->id),
                        'url_destroy' => route('users.destroy', $users->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "nik" => "required|digits_between:16,16|unique:users",
            "phone" => "required|digits_between:10,12",
            "address" => "required|min:10|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|min:5|max:35",
        ])->validate();

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->nik = $request->get('nik');
        $new_user->roles = json_encode(['VOTER']);
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->status = "BELUM";

        $new_user->save();
        return redirect()->route('users.create')->with('status', 'User successfully Created');
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
        $user = \App\User::findOrFail($id);
        return view('users.edit', ['user'=>$user]);
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
            "name" => "required|min:5|max:100",
            "nik" => "required|digits_between:16,16",
            "phone" => "required|digits_between:10,12",
            "address" => "required|min:10|max:255",
            "email" => "required|email",
        ])->validate();

        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->nik = $request->get('nik');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');

        $user->save();
        return redirect()->route('users.index')->with('status', 'User successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User successfully Deleted');
    }
}
