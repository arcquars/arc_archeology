<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stratum_cards', function (Blueprint $table) {
            $table->dropColumn([
                'fine_fraction_percent_sand',
                'fine_fraction_percent_clay',
                'fine_fraction_percent_clay_sandy',
                'fine_fraction_percent_silty_clay',
                'fine_fraction_percent_silt',
                'fine_fraction_percent_clay_silt',
                'coarse_fraction_percent_gravas',
                'coarse_fraction_percent_cantos',
                'coarse_fraction_percent_bloques',
                'comp_organic_ash',
                'comp_organic_coal',
                'comp_organic_bone',
                'comp_organic_wood',
                'comp_inorganic_brick',
                'comp_inorganic_slag',
                'comp_inorganic_plastering',
                'comp_inorganic_mortar',
                'comp_inorganic_cal',
                'comp_inorganic_stone_trab',
                'comp_inorganic_tiles',
                'comp_inorganic_adobes',
                'comp_inorganic_plastic',
                'stratigraphy_equal_to',
                'stratigraphy_equi_you_are_supported',
                'stratigraphy_it_relies_on',
                'stratigraphy_overed_by',
                'stratigraphy_covers_or_overlaps',
                'stratigraphy_filling_by',
                'stratigraphy_fill_in',
                'stratigraphy_cut_by',
                'stratigraphy_cut_to'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stratum_cards', function (Blueprint $table) {
            //
        });
    }
};
