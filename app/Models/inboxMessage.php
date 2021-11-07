<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class inboxMessage extends Pivot
{
    protected $table = 'inbox_messages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['chat_id', 'inbox_id'];
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
    public function inbox()
    {
        return $this->belongsTo(inbox::class);
    }
}
