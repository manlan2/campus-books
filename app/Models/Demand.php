<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public function path()
    {
        return '/demands/' . $this->id;
    }

    public function onwer()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public static function hot($num){
        return \App\Models\Demand::with('onwer')->latest('views_count')->take(3)->get();
    }
}