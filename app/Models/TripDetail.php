<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TripDetail extends Model
{
    use HasFactory;

    protected $table = 'trip_details';

    protected $fillable = [
        'registration_id',
        'visa',
        'departure_date',
        'return_date',
        'gathering_location',
        'guide_name',
        'airline',
        'flight_number',
        'hotel_info',
        'equipment_info',
        'ticket',
    ];

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->whereHas('registration', function ($q) use ($keyword) {
            $q->where('registration_number', 'like', '%' . $keyword . '%');
        });
    }

    public function scopeFilter($query, $type)
    {
        if ($type) {
            return $query->whereHas('registration', function ($q) use ($type) {
                $q->whereHas('package', function ($q) use ($type) {
                    $q->where('type', $type);
                });
            });
        }

        return $query;
    }
}