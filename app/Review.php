<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title', 'grade', 'description', 'user_id', 'place_id',
    ];

    public function place() {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function user() {
        $this->belongsTo('App\User','user_id');
    }
}
