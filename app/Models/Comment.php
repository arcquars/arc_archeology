<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Scope para Comments activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
