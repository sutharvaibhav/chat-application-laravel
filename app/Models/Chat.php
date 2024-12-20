<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = ['sender','receiver','message'];

    public function getFormattedTimeAttribute()
    {
        return $this->created_at->format('h:i A');
    }
}
