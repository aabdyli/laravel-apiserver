<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'description'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
