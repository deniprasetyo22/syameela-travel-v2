<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $fillable = [
        'user_id',
        'package_id',
        'registration_number',
        'payment_scheme',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function tripDetail(): HasOne
    {
        return $this->hasOne(TripDetail::class);
    }

    public function manasik(): HasMany
    {
        return $this->hasMany(Manasik::class);
    }

    // Scope untuk search
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('registration_number', 'like', "%{$keyword}%")
                ->orWhereHas('user', function ($q) use ($keyword) {
                $q->where('full_name', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%")
                ->orWhere('username', 'like', "%{$keyword}%");
            });
        });
    }

    // Scope untuk filter type
    public function scopeFilter($query, $type)
    {
        if ($type) {
            return $query->whereHas('package', function ($q) use ($type) {
                $q->where('type', $type);
            });
        }

        return $query;
    }

}