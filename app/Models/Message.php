<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['sender_id', 'chat_id', 'message'];
    public function sender()
    {
        return $this->belongsTo(User::class);
    }
}
