<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table='exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date','time', 'user_id', 'subject_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

}
