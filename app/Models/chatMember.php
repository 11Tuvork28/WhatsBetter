<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class chatMember extends Pivot
{
    //
    protected $table = 'chat_members';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['user_id', 'chat_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
