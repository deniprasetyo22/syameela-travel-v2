<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['title', 'image', 'type'];

    public static function search($keyword)
    {
        return static::where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        });
    }
}