<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['name'];
}
