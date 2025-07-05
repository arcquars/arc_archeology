<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialRecount extends Model
{
    use HasFactory;

    protected $fillable = [
        'ue',
        'chronology',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
