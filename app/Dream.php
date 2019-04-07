<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'dreamer',
        'title',
        'slug',
        'body',
        'views',
        'ordering'
    ];
}
