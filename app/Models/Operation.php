<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operation extends Model
{
    /**
     * @return BelongsTo
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'seller');
    }

    /**
     * @return BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'buyer');
    }

    /**
     * @return Organization
     */
    public function getSeller(): Organization
    {
        return $this->seller()->first();
    }

    /**
     * @return Organization
     */
    public function getBuyer(): Organization
    {
        return $this->buyer()->first();
    }
}
