<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AOSTest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thematics';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];
}
