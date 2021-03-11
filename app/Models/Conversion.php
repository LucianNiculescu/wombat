<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model {
    public $table = 'conversions';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'input', 'output'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'input'     => 'integer',
        'output'    => 'string'
    ];

}
