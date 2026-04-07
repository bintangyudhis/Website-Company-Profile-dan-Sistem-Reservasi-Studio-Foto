<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'service_package_id',
        'reservation_date',
        'reservation_time',
        'head_count',
        'notes',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'date',
    ];

    public function servicePackage(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class);
    }
}
