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

    // Hide these so API tests can differentiate between clubs with the same timestamps
    protected $hidden = ['created_at', 'updated_at'];

}
