<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureBrick extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'long' => 'double',
        'width' => 'double',
        'thick' => 'double',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'long',
        'width',
        'thick',
        'structure_tab_id'
    ];
}
