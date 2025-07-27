<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDocument extends Model
{
    use HasFactory;

    protected $table = 'user_documents';

    protected $fillable = [
        'user_id',
        'id_card',
        'family_card',
        'passport',
        'photo',
        'marriage_certificate',
        'vaccine',
        'verified_at',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'verified_at' => 'datetime',
    //         'uploaded_at' => 'datetime',
    //     ];
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}