<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'route_id',
        'address_id',
        'type',
        'status',
    ];

    const DELIVERY_STATUSES = [
        1 => 'not delivered',
        2 => 'delivered',
        3 => 'canceled'
    ];

    const DELIVERY_TYPES = [
        1 => 'liquid',
        2 => 'material',
        3 => 'liquid and material'
    ];

    public function getDeliveryStatusAttribute($value): string
    {
        return self::DELIVERY_STATUSES[$value];
    }

    public function getDeliveryTypeAttribute($value): string
    {
        return self::DELIVERY_TYPES[$value];
    }

    public function setAttribute($key, $value)
    {
        if ($key === 'status') {
            $value = array_search($value, self::DELIVERY_STATUSES);
        }

        if ($key === 'type') {
            $value = array_search($value, self::DELIVERY_TYPES);
        }

        parent::setAttribute($key, $value);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
