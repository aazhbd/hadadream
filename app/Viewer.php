<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    public $table = "viewer";
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'ipaddress',
        'useragent'
    ];
}
