<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
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
    public function create(Request $request)
    {
        request()->validate([
            'job_title' => 'required|string|max:100',
            'salary' => 'nullable|integer|digits_between:5,20',
            'description' => 'required|string|max:400',
            'location' => 'required|string|max:150',
            'qualifications' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:100'
        ]);

        $job = Job::create([
            'job_title' => request()->job_title,
            'salary' => request()->salary,
            'description' => request()->description,
            'location' => request()->location,
            'qualifications' => request()->qualifications,
            'company_name' => request()->company_name,
            'user_id' => auth()->user()->id
        ]);

        if(!$job){
            return response()->json([
                'status_code' => 422,
                'message' => 'an error occured!'
            ]);
        } else {
            return response()->json([
                'status_code' => 200,
                'message' => 'job post was created successfully!',
                'job' => $job
            ]);
        }

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
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
