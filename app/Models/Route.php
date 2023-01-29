<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Route extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'date',
        'car_number',
        'car_type',
        'status',
        'driver_name',
    ];

    const ROUTE_STATUS = [
        1 => 'created',
        2 => 'scheduled',
        3 => 'closed'
    ];

    const CAR_TYPE = [
        1 => 'tank truck',
        2 => 'regular truck',
    ];

    public function getCarTypeAttribute($value): string
    {
        return self::CAR_TYPE[$value];
    }

    public function getRouteStatusAttribute($value): string
    {
        return self::ROUTE_STATUS[$value];
    }

    public function setAttribute($key, $value)
    {
        if ($key === 'car_type') {
            $value = array_search($value, self::CAR_TYPE);
        }

        if ($key === 'status') {
            $value = array_search($value, self::ROUTE_STATUS);
        }

        parent::setAttribute($key, $value);
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function deliveryLines(): HasManyThrough
    {
        return $this->hasManyThrough(DeliveryLine::class, Delivery::class);
    }
}
