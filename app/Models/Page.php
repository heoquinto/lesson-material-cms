<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return $this->attributes['url'] ? '/' . $this->attributes['url'] : '';
    }
}
