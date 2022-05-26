<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\File;
use App\Models\UserScholarship;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup($scholarship_id)
    {
        $file = File::where('id_user', auth()->user()->id)->first();
        if (!$file) {
            return redirect()->route('file.create')->withErrors(['msg' => 'Upload your files first !']);
        }

        $user_scholarship = UserScholarship::where('id_user', auth()->user()->id)->where('id_scholarship', $scholarship_id)->get();
        if (!$user_scholarship) {
            return redirect()->route('home')->withErrors(['msg' => 'Scholarship already signed up !']);
        }

        $data = new UserScholarship();
        $data->id_user = auth()->user()->id;
        $data->id_scholarship = $scholarship_id;
        $data->status = "pending";
        $data->save();

        return redirect()->route('home')->with('success', 'You have successfully signed up');
    }
}
