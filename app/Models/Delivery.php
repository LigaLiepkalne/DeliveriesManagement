<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Delivery extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'deliveries';

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
/*
    public function getDeliveryStatusAttribute(): string
    {
        return self::DELIVERY_STATUSES[$this->status];
    }

    public function getDeliveryTypeAttribute(): string
    {
        return self::DELIVERY_TYPES[$this->type];
    }
*/
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


    protected $fillable = [
        'route_id',
        'address_id',
        'type',
        'status',
    ];

    //one delivery has one address
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    //one delivery has one route
    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);

    }

    public function deliveryLine(): HasOne
    {
        return $this->hasOne(DeliveryLine::class);
    }
    //one delivery has one delivery line

    /*
    {
        return $this->belongsTo(DeliveryLine::class);
    }

    */

    public function deliveryLines()
    {
        return $this->hasMany(DeliveryLine::class);
    }
}
