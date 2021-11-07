<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    use HasFactory;
    protected $table = 'inboxes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function inboxmessage()
    {
        return $this->hasOne(inboxMessage::class);
    }
}
