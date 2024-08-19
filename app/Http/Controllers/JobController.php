<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request()->validate([
            "title" => ['required', 'min:3'],
            "salary" =>['required'],
    
        ]);
    
        Job::create([
            "title" => request('title'),
            "salary" =>request('salary'),
            "employer_id" => 2,
        ]);

        Mail::to('omwoyoobara@gmail.com')->queue
        (
            new JobPosted()
        );
    
        return redirect("/jobs");
    }

    public function read()
    {
        // Implementation for reading all job
        $jobs = Job::with('employer')->paginate(2);
        return view('jobs.index' , [
        'jobs' => $jobs 
    ]);
    }

    public function show($id)
    {
        // Implementation for updating a specific job
        $job = Job::find($id);
        return view("jobs.show", ["job" => $job]);
    } 



    public function update($id)
    {
        request()->validate([
            "title" => ['required', 'min:3'],
            "salary" =>['required'],
    
        ]);
        // authorization
    
        // update the job
        $job = Job::findOrFail($id);
    
        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();
    
        return redirect("/jobs/" . $job->id);
        
    } 

    public function edit($id)
    {
        $job = Job::find($id);
        // Implementation for updating a job

        // Gate::define('edit_job' , function(User $user, Job $job){
        //    return  $job->employer->user->is($user);

        // });
        if(Auth::guest()){
            return redirect("/login");
        };

        Gate::authorize('edit_job', $job);
// denies allows
        return view("jobs.edit", ["job" => $job]);
    } 

    public function delete($id)
    {
        // Implementation for deleting a job
        $job = Job::findOrFail($id);
        $job->delete();

       return redirect("/jobs");
    }
}
