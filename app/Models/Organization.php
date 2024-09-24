<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    public $sells_sum;
    public $buys_sum;

    /**
     * @return HasMany
     */
    public function sells(): HasMany
    {
        return $this->hasMany(Operation::class, 'seller');
    }

    /**
     * @return HasMany
     */
    public function buys(): HasMany
    {
        return $this->hasMany(Operation::class, 'buyer');
    }
}
