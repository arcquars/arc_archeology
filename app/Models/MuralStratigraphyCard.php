<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuralStratigraphyCard extends Model
{
    /**

     * The attributes that are mass assignable.

     *

     * @var array<int, string>

     */

    protected $fillable = [
        'msc_date',
        'floor',
        'stay',
        'quadrant',
        'acronym',
        'fact',
        'n_ue',
        'provisional_dating',
        'stratigraphic_reliability',
        'identification_type',
        'preservation',
        'description',
        'component_stone_type',
        'component_stone_characteristics',
        'component_stone_size',
        'component_brick_type',
        'component_brick_characteristics',
        'component_brick_measures',
        'component_binder_type',
        'component_binder_characteristics',
        'component_binder_joints',
        'component_tapial_box',
        'component_tapial_height',
        'stratigraphy_equals_to',
        'stratigraphy_equivalent',
        'stratigraphy_it_is_supported',
        'stratigraphy_rests_on',
        'stratigraphy_covered_by',
        'stratigraphy_covers_to',
        'stratigraphy_filled_by',
        'stratigraphy_fills_to',
        'stratigraphy_cut_by',
        'stratigraphy_cut_to',
        'comments',
        'num_flat',
        'num_photography',
    ];

    public function urlCroquisAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-estratigrafia-mural/".$this->id."/croquis";
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-estratigrafia-mural/".$this->id."/fotografias";
    }
}
