<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study_Subject extends Model
{
    protected $table='study_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'study_id', 'subject_id'
    ];

    public function study(){
        return $this->belongsTo('App\Study','study_id');
    }

    public function subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

}
