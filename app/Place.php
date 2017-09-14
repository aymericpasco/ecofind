<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Place extends Model
{

    use Sluggable;
    use Searchable;

//    public function searchableAs()
//    {
//        return 'id';
//    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'address', 'department', 'city', 'lat', 'lng', 'description', 'cost', 'type', 'user_id',
    ];

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
