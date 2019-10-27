<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table='subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'semester', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}
