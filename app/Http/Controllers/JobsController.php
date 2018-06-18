<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $job = new Jobs;
        $job->description = $request->description;
        $job->mechanic_id = $request->mechanic_id;
        $job->client_id = Auth::id();
        $job->user_id = Auth::id();
        $job->save();
        return $job;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobs $jobs)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobs $jobs)
    {
        //
    }

    public function updateJobTrue(Request $request, Jobs $jobs, $id)
    {
        // return $request->all();
        $job = Jobs::find($id);
        $job->status = true;
        $job->save();
        return $job;
    }

    public function updateJobFalse(Request $request, Jobs $jobs, $id)
    {
        // return $request->all();
        $job = Jobs::find($id);
        $job->status = false;
        // return $request->status;
        $job->save();
        return $job;
    }

    public function getJobs(Request $request, Jobs $jobs, $id)
    {
        return json_decode(json_encode(Jobs::where('user_id', $id)->get()), true);
    }
}
