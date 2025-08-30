<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'thumbnail', 'date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'date' => 'datetime', // <<< ini bikin $activity->date jadi Carbon object
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

