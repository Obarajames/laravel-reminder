<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \illuminate\support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{

    use HasFactory;
    protected $table = 'jobs_listings';

    protected $fillable = [
        'title',
        'salary',
        'employer_id'
    ]; 

    // protected $guarder = [];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }


    

};
