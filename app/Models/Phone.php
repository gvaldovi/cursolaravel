<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['number',    
                            'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
