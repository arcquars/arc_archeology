<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class StratumQuotes extends Model
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
        'stratum_card_id'
    ];
}
