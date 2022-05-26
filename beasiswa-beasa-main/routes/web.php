<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserScholarshipController;
use App\Models\Scholarship;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $scholarship = Scholarship::all();
    return view('home', compact('scholarship'));
})->name('home');

Route::get('/search', function (Request $request) {
    $scholarship = Scholarship::when($request->domicile, function ($query, $domicile) {
        return $query->where('domicile', $domicile);
    })->when($request->strata, function ($query, $strata) {
        return $query->where('strata', $strata);
    })->when($request->type, function ($query, $type) {
        return $query->where('type', $type);
    })->when($request->search, function ($query, $search) {
        return $query->where('title', 'LIKE', '%' . $search . '%');
    })->get();
    return view('home', compact('scholarship'));
})->name('search');

Route::get('/detail/{id}', function ($id) {
    $scholarship = Scholarship::find($id);
    return view('detail', compact('scholarship'));
})->name('detail');

Route::middleware('auth:sanctum')->group(function () {

    // File
    Route::prefix('file')->name('file')->group(function () {
        Route::get('/', [FileController::class, 'index'])->name('');
        Route::get('/create', [FileController::class, 'create'])->name('.create');
        Route::post('/create', [FileController::class, 'store'])->name('.create.process');
        Route::post('/edit', [FileController::class, 'update'])->name('.edit.process');
    });

    // Feedback
    Route::prefix('feedback')->name('feedback')->group(function () {
        Route::post('/',[PostController::class, 'reviewstore'])->name('review.show');
    });

    // My Scholarship
    Route::prefix('my')->name('my')->group(function () {
        Route::get('/', [UserScholarshipController::class, 'index'])->name('');
        Route::get('/{id}/delete', [UserScholarshipController::class, 'destroy'])->name('.destroy');
    });

    Route::prefix('scholarship')->name('scholarship')->group(function () {
        Route::get('/{id}/signup', [ScholarshipController::class, 'signup'])->name('.signup');
    });

    Route::middleware('campuss')->group(function () {

        // Scholarship
        Route::prefix('scholarship')->name('scholarship')->group(function () {
            Route::get('/', [ScholarshipController::class, 'index'])->name('');
            Route::get('/create', [ScholarshipController::class, 'create'])->name('.create');
            Route::post('/create', [ScholarshipController::class, 'store'])->name('.create.process');
            Route::get('/{id}/edit', [ScholarshipController::class, 'edit'])->name('.edit');
            Route::post('/{id}/edit', [ScholarshipController::class, 'update'])->name('.edit.process');
            Route::get('/{id}/delete', [ScholarshipController::class, 'destroy'])->name('.destroy');

            Route::get('/{id}/registrant', [ScholarshipController::class, 'registrant'])->name('.registrant');
            Route::get('/{id}/registrant/{id_registrant}', [ScholarshipController::class, 'registrant_detail'])->name('.registrant.detail');
            Route::get('/{id}/registrant/{id_registrant}/accept', [ScholarshipController::class, 'registrant_accept'])->name('.registrant.detail.accept');
            Route::get('/{id}/registrant/{id_registrant}/decline', [ScholarshipController::class, 'registrant_decline'])->name('.registrant.detail.decline');
        });
    });


});
