<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function experience(Request $request, Resume $resume, $id)
    {
        // return $request->all();
        $experience = new Experience;
        // $flight = App\Flight::firstOrCreate(['name' => 'Flight 10']);
        $experience->job_title = $request->job_title;
        $experience->company_name = $request->company_name;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->bio = $request->bio;
        $experience->user_id = Auth::id();
        $experience->save();
        return $experience;
    }
}
