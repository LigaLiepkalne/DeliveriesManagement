<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    //define the relationship with the addresses table (one to many)
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
