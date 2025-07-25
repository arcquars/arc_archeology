<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class StructureQuote extends Model
{
    use Auditable;

    /**
     * @var array
     */
    protected $casts = [
        'surface' => 'double',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surface',
        'information',
        'structure_tab_id'
    ];


}
