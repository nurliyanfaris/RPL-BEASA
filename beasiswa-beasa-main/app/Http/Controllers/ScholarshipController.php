<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\UserScholarship;
use App\Models\User;
use App\Models\File as FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $scholarship = Scholarship::all();
        } else {
            $scholarship = Scholarship::where('id_user', Auth::user()->id)->get();
        }
        return view('scholarship.index', compact('scholarship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'campus' => 'required,',
            'domicile' => 'required',
            'strata' => 'required',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'link' => 'required',
        ]);

        $scholarship = new Scholarship();
        $scholarship->id_user = Auth::user()->id;
        $scholarship->title = $request->title;
        $scholarship->domicile = $request->domicile;
        $scholarship->strata = $request->strata;
        $scholarship->type = $request->type;
        $scholarship->description = $request->description;

        // Upload Image
        $image = $request->file('cover');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/images'), $image_name);
        $scholarship->cover = "/images/" . $image_name;
        $scholarship->link = $request->link;
        $scholarship->save();

        return redirect()->route('scholarship')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($scholarship_id)
    {
        $scholarship = Scholarship::find($scholarship_id);
        if (Auth::user()->role == 'admin') {
            return view('scholarship.edit', compact('scholarship'));
        } elseif ($scholarship->id_user == Auth::user()->id) {
            return view('scholarship.edit', compact('scholarship'));
        } else {
            return redirect()->route('scholarship')->withErrors(['msg' => "You're not the owner of this !"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $scholarship_id)
    {

        $request->validate([
            'title' => 'required',
            'campus' => 'required,',
            'domicile' => 'required',
            'strata' => 'required',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'link' => 'required',
        ]);


        $scholarship = Scholarship::find($scholarship_id);

        if (Auth::user()->role == 'admin' || $scholarship->id_user == Auth::user()->id) {
            $scholarship->title = $request->title;
            $scholarship->domicile = $request->domicile;
            $scholarship->strata = $request->strata;
            $scholarship->type = $request->type;
            $scholarship->description = $request->description;
            $scholarship->link = $request->link;

            // Upload Image
            if (isset($request->cover)) {
                // Delete Old Image ( Still Not Working I Guess)
                if (isset($scholarship->cover)) {
                    if (File::exists($scholarship->cover)) {
                        File::delete($scholarship->cover);
                    }
                }
                // Upload Image
                $image = $request->file('cover');
                $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
                $image->move(public_path('/images'), $image_name);
                $scholarship->cover = "/images/" . $image_name;
            }

            $scholarship->save();

            return redirect()->route('scholarship')->with('success', 'Data updated successfully');
        } else {
            return redirect()->route('scholarship')->withErrors(['msg' => "You're not the owner of this !"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy($scholarship_id)
    {
        $scholarship = Scholarship::find($scholarship_id);
        if (Auth::user()->role == 'admin') {
            $scholarship->delete();
        } elseif ($scholarship->id_user == Auth::user()->id) {
            $scholarship->delete();
        } else {
            return redirect()->route('scholarship')->withErrors(['msg' => "You're not the owner of this !"]);
        }

        return redirect()->route('scholarship')->with('success', 'Data deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrant($scholarship_id)
    {
        $userScholarship = UserScholarship::where('id_scholarship', $scholarship_id)->get();
        $registrant = [];
        foreach ($userScholarship as $user) {
            $temp = User::find($user->id_user);
            $temp->{'status'} = $user->status;
            $registrant[] = $temp;
        }
        return view('scholarship.registrant', compact('scholarship_id', 'registrant'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrant_detail($scholarship_id, $user_id)
    {
        $file = FileModel::where('id_user', $user_id)->first();
        $user = User::find($user_id);
        return view('scholarship.detail', compact('file','scholarship_id', 'user_id','user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrant_accept($scholarship_id, $user_id)
    {
        $userScholarship = UserScholarship::where('id_scholarship', $scholarship_id)->where('id_user', $user_id)->first();
        $userScholarship->status = 'accepted';
        $userScholarship->save();

        return redirect()->route('scholarship.registrant',$scholarship_id)->with('success', 'Registrant accepted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrant_decline($scholarship_id, $user_id)
    {
        $userScholarship = UserScholarship::where('id_scholarship', $scholarship_id)->where('id_user', $user_id)->first();
        $userScholarship->status = 'declined';
        $userScholarship->save();

        return redirect()->route('scholarship.registrant',$scholarship_id)->with('success', 'Registrant declined successfully');
    }
}
