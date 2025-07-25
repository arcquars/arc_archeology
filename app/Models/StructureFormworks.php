<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class StructureFormworks extends Model
{
    use Auditable;

    /**
     * @var array
     */
    protected $casts = [
        'formwork' => 'double',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'formwork',
        'structure_tab_id'
    ];
}
