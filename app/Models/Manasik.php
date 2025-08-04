<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manasik extends Model
{
    protected $table = 'manasik';

    protected $fillable = [
        'registration_id',
        'date',
        'location',
        'note',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($query) use ($keyword) {
            $query->whereHas('registration', function ($q) use ($keyword) {
                $q->where('registration_number', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('registration.package', function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        });
    }

}