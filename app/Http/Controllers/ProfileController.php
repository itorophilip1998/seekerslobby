<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $profile = Profile::find($id);
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dob' => 'nullable|string',
            'address' => 'nullable|string',
            'state' => 'nullable|string',
            'nationality' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'years_of_experience' => 'nullable|string',
            'working_experience' => 'nullable|string'
        ]);

        $profile->dob = $request->dob ?? $profile->dob;
        if($request->has('photo')){
            $user_photo = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $user_photo);
        }
        $profile->photo = $request->photo ?? $profile->photo;
        $profile->address = $request->address ?? $profile->address;
        $profile->state = $request->state ?? $profile->state;
        $profile->nationality = $request->nationality ?? $profile->nationality;
        $profile->qualifications = $request->qualifications ?? $profile->qualifications;
        $profile->years_of_experience = $request->years_of_experience ?? $profile->years_of_experience;
        $profile->working_experience = $request->working_experience ?? $profile->working_experience;

        // dd($request->all());

        $profile->update();

        return response()->json([
            'status_code' => 200,
            'profile' => $profile,
            'message' => 'Your profile has been updated successfully!'
        ]);



        // $image      =       time().'.'.$request->image->extension();

        // $request->image->move(public_path('uploads'), $image);

        // $image      =       Image::create(["image_name" => $image]);

        // if(!is_null($image)) {
        //     return back()->with('success','Success! image uploaded');
        // }

        // else {
        //     return back()->with("failed", "Alert! image not uploaded");
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
