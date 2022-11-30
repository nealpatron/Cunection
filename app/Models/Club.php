<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function subscribers()
    {
        return $this->followers()->wherePivot('notify', true);
    }


}
