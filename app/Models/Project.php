<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Project extends Model
{
    use HasFactory;

    use Auditable;

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
        if($hrcMaxUe > $ueNext ){
            $ueNext = $hrcMaxUe;
        }
        /*
        $catalogueArchitectualMaxUe = CatalogueArchitectual::where('project_id', $this->id)->max('proceed_ue');
        if($catalogueArchitectualMaxUe > $ueNext ){
            $ueNext = $catalogueArchitectualMaxUe;
        }

        $materialMaxUe = Material::where('project_id', $this->id)->max('ue');
        if($materialMaxUe > $ueNext ){
            $ueNext = $materialMaxUe;
        }

        $materialRecountMaxUe = MaterialRecount::where('project_id', $this->id)->max('ue');
        if($materialRecountMaxUe > $ueNext ){
            $ueNext = $materialRecountMaxUe;
        }
        */

        $ueNext = intval($ueNext);
        return $ueNext>0? $ueNext + 1 : 0;
    }

    public function allUes(){
        $query1 = DB::table('mural_stratigraphy_cards')->select("n_ue", DB::raw('"mural_stratigraphy" material_sheets'))->where('project_id', $this->id);
        $query2 = DB::table('stratum_cards')->select(DB::raw('i_n_ue as n_ue'), DB::raw('"stratum_cards" material_sheets'))->where('project_id', $this->id);
        $query3 = DB::table('structure_tabs')->select(DB::raw('i_n_ue as n_ue'), DB::raw('"structure_tabs" material_sheets'))->where('project_id', $this->id);
        $query4 = DB::table('human_remain_cards')->select(DB::raw('ue as n_ue'), DB::raw('"human_remain_card" material_sheets'))->where('project_id', $this->id);

        return $query1->union($query2)->union($query3)->union($query4)->orderBy('n_ue')->get();
    }
}
