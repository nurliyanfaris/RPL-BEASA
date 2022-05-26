<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::where('id_user', auth()->user()->id)->first();
        if (!$file) {
            return redirect()->route('file.create')->withErrors(['msg' => 'Upload your files first !']);
        }
        return view('file.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
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
            'cv' => 'required',
            'grades' => 'required',
            'letter1' => 'required',
            'letter2' => 'required',
            'kk' => 'required',
            'photo' => 'required',
        ]);

        $file = new File();
        $file->id_user = auth()->user()->id;

        // upload cv
        $image = $request->file('cv');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/cv'), $image_name);
        $file->cv = "/cv/" . $image_name;

        // upload grades
        $image = $request->file('grades');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/grades'), $image_name);
        $file->grades = "/grades/" . $image_name;

        // upload letter1
        $image = $request->file('letter1');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/letter1'), $image_name);
        $file->letter1 = "/letter1/" . $image_name;

        // upload letter2
        $image = $request->file('letter2');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/letter2'), $image_name);
        $file->letter2 = "/letter2/" . $image_name;

        // upload kk
        $image = $request->file('kk');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/kk'), $image_name);
        $file->kk = "/kk/" . $image_name;

        // upload photo
        $image = $request->file('photo');
        $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
        $image->move(public_path('/photo'), $image_name);
        $file->photo = "/photo/" . $image_name;

        $file->save();

        return redirect()->route('file')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $file = File::where('id_user', auth()->user()->id)->first();
        if (!$file) {
            return redirect()->route('file.create')->withErrors(['msg' => 'Upload your files first !']);
        }

        // upload cv
        if (isset($request->cv)) {
            $image = $request->file('cv');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/cv'), $image_name);
            $file->cv = "/cv/" . $image_name;
        }

        // upload grades
        if (isset($request->grades)) {
            $image = $request->file('grades');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/grades'), $image_name);
            $file->grades = "/grades/" . $image_name;
        }

        // upload letter1
        if (isset($request->letter1)) {
            $image = $request->file('letter1');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/letter1'), $image_name);
            $file->letter1 = "/letter1/" . $image_name;
        }

        // upload letter2
        if (isset($request->letter2)) {
            $image = $request->file('letter2');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/letter2'), $image_name);
            $file->letter2 = "/letter2/" . $image_name;
        }

        // upload kk
        if (isset($request->kk)) {
            $image = $request->file('kk');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/kk'), $image_name);
            $file->kk = "/kk/" . $image_name;
        }

        // upload photo
        if (isset($request->photo)) {
            $image = $request->file('photo');
            $image_name = Str::random(15) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/photo'), $image_name);
            $file->photo = "/photo/" . $image_name;
        }

        $file->save();

        return redirect()->route('file')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
