<?php


// Not using this anymore. Just using genric pivot table

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Follower extends Pivot
{
    protected $casts = ['notify' => 'boolean'];
}
