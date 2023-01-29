<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryLine extends Model
{
    use HasFactory;

    protected $table = 'delivery_lines';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'delivery_id',
        'item',
        'price',
        'qty',
    ];

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }

    //one delivery line can have one route
}
