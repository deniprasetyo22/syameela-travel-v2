<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'registration_id',
        'amount',
        'payment_proof',
        'paid_at',
        'verification_status',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'amount' => 'decimal:2',
    //         'paid_at' => 'datetime',
    //     ];
    // }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }
}