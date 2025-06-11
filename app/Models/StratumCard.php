<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StratumCard extends Model
{
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '',
    ];

    public function meta(){
        return $this->hasOne(StratumCardMeta::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    // Scope para Ue's activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-de-estrato/".$this->id."/fotografias";
    }
}
