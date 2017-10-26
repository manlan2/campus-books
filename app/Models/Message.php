<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\UserReceivedNewChatMessage;

class Message extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::bootTraits();

        static::created(function ($query) {
            Contact::whereIn('user_id', [$query->from_user_id, $query->to_user_id])->update(['message' => $query->message]);
            event(new UserReceivedNewChatMessage($query));
        });
    }

    public function fromUser()
    {
        return $this->belongsTo(\App\User::class, 'from_user_id', 'id');
    }

    public function toUser()
    {
        return $this->belongsTo(\App\User::class, 'to_user_id', 'id');
    }
}
