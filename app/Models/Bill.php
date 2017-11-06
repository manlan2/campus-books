<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::bootTraits();

        static::creating(function ($query) {
            if ($query->billed_type == 'App\Models\Recharge') {
                $query->onwer()->increment('balances', $query->billed->money);
            }
            if ($query->billed_type == 'App\Models\Order') {
                $query->onwer()->decrement('balances', $query->billed->orderPrice());
            }
        });
    }

    /**
     * [bills description]
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function billed()
    {
        return $this->morphTo();
    }

    /**
     * [bills description]
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function onwer()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
