<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'url', 'user_id', 'is_enabled', 'is_locked'
    ];
}
