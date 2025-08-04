<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'type',
        'image',
        'description',
        'price',
        'quota',
        'facilities',
        'departure_date',
        'return_date',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public static function search($keyword)
    {
        return static::where(function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        });
    }

}