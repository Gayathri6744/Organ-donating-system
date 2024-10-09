<?php

namespace App\Http\Controllers;

use App\Models\hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class hospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reg()
    {
        return view('hospital.addhospital');
    }
    public function hospitalhome()
    {
        return view('hospital.hospitalhome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request);
          $imagename = time() . '.' . $request->image->getClientOriginalExtension();
          $foldername = 'imageupload';
          $request->image->move(public_path('/' . $foldername), $imagename);
          $imagepath = $foldername . '/' . $imagename;
        //   dd($imagepath);
          $hospital = new hospital();
          $hospital->name = $request->name;
          $hospital->place = $request->place;
          $hospital->district = $request->district;
          $hospital->address = $request->address;
          $hospital->phone_number = $request->phone_number;
          $hospital->lattitude = $request->lattitude;
          $hospital->longitude = $request->longitude;
        //   dd($lattitude);
          $hospital->image = $imagepath;
          $hospital->save();
  
          $last = hospital::latest()->first();
          
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->type = $request->type;
          $user->user_id = $last['id'];
          $user->type='hospital';
          $user->status='approved';
          $user->save();
  
          return redirect()->back()->with("success", "succesfully added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
