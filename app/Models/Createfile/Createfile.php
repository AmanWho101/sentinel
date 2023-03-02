<?php

namespace App\Models\Createfile;

use Illuminate\Database\Eloquent\Model;



class Createfile extends Model
{

    public $table = 'createfiles';
    


    public $fillable = [
        'name',
        'path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
