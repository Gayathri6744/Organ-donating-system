<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userreg;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = new userreg();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->blood_group = $request->blood_group;
        $user->gender = $request->gender;
        $user->date_of_birth= $request->date_of_birth;
        $user->phone_number = $request->phone_number;
        $user->save();
        $last = userreg::latest()->first();
        // dd($last);
        $user1 = new user();
        $user1->name = $request->name;
        $user1->email = $request->email;
        $user1->type = $request->type;
        $user1->password = Hash::make($request->password);
        $user1->user_id = $last['id'];
        $user1->save();

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
