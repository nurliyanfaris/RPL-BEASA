<?php

namespace App\Http\Controllers;

use App\Models\UserScholarship;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class UserScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userScholarship = UserScholarship::where('id_user', auth()->user()->id)->get();
        $scholarship = [];
        foreach ($userScholarship as $sc) {
            $temp = Scholarship::find($sc->id_scholarship);
            $temp->{'status'} = $sc->status;
            $scholarship[] = $temp;
        }
        return view('userScholarship.index', compact('scholarship'));
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
     * @param  \App\Models\UserScholarship  $userScholarship
     * @return \Illuminate\Http\Response
     */
    public function show(UserScholarship $userScholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserScholarship  $userScholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(UserScholarship $userScholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserScholarship  $userScholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserScholarship $userScholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy($scholarship_id)
    {
        $scholarship = UserScholarship::find($scholarship_id);
        $scholarship->delete();

        return redirect()->route('my')->with('success', 'Data deleted successfully');
    }
}
