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
        'trip_status',
        'departure_date',
        'gathering_location',
        'guide_name',
        'airline',
        'flight_number',
        'hotel_info',
        'room_info',
        'uniform_info',
        'equipment_info',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'departure_date' => 'datetime',
    //     ];
    // }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }
}