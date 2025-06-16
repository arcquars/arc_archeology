<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;

class Project extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'acronym',
        'expedient',
        'initial_quota',
        'final_quota',
        'utm',
        'initial_date',
    ];

    /**
     * Los atributos que deben ser convertidos a instancias de Carbon.
     *
     * @var array<string>
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
//    protected $casts = [
//        'varchar_column' => 'integer', // Aquí es donde se define el cast
//    ];

    /**
     * Get the users that belong to the project.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Scope para proyectos activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function ueNext(){
        $ueNext = 0;
        $mscMaxUe = MuralStratigraphyCard::where('project_id', $this->id)->max('n_ue');
        if($mscMaxUe > $ueNext ){
            $ueNext = $mscMaxUe;
        }
        $scmMaxUe = StratumCard::where('project_id', $this->id)->max('i_n_ue');
        if($scmMaxUe > $ueNext ){
            $ueNext = $scmMaxUe;
        }
        $stMaxUe = StructureTab::where('project_id', $this->id)->max('i_n_ue');
        if($stMaxUe > $ueNext ){
            $ueNext = $stMaxUe;
        }
        $hrcMaxUe = HumanRemainCard::where('project_id', $this->id)->max('ue');
        Log::info("cccc:: " . $hrcMaxUe);
        if($hrcMaxUe > $ueNext ){
            $ueNext = $hrcMaxUe;
        }

        $ueNext = intval($ueNext);
        return $ueNext>0? $ueNext + 1 : 0;
    }
}
