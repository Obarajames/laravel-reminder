<?php

use App\Models\Job;
use App\Mail\JobPosted;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;

Route::get("test", function(){
    // return new JobPosted();
    // Mail::to('omwoyoobara@gmail.com')->send(
    //     new JobPosted()
    // );

    // dispatch('hello from a queue')

    return "done"; 
});



Route::view("/" , "home");

Route::get("/jobs", [JobController::class , "read"]);

Route::get('/jobs/create', [JobController::class , "create"]);

Route::post("/jobs", [JobController::class , "store"])->middleware('auth');

Route::get("/jobs/{id}", [JobController::class , "show"]);

Route::get("/jobs/{id}/edit", [JobController::class , "edit"])->middleware(['auth','can:edit_job.id']);

Route::patch("/jobs/{id}", [JobController::class , "update"]);

Route::delete("/jobs/{id}", [JobController::class , "delete"]);


Route::view("/contact" , "contact");


// Auth
Route::get("/register" , [RegisterUserController::class , "create"]);
Route::post("/storeuser" , [RegisterUserController::class , "store"]);

Route::get("/login" , [SessionController::class , "create"]);
Route::post("/login" , [SessionController::class , "store"]);
Route::post("/logout" , [SessionController::class , "destroy"]);


