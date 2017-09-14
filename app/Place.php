<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'address', 'department', 'lat', 'lng', 'description', 'cost', 'type', 'user_id',
    ];

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
