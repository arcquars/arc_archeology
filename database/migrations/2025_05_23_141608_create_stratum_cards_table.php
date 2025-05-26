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
        Schema::create('stratum_cards', function (Blueprint $table) {
            $table->id();

            // IDENTIFICATION
            $table->date('i_date');
            $table->string('i_location_intervention', 250);
            $table->string('i_acronym', 250);
            $table->string('i_fact', 250);
            $table->string('i_n_ue', 250);
            $table->string('i_provisional_dating', 250)->nullable();
            $table->string('i_stratigraphic_reliability', 250)->nullable();
            $table->string('i_type', 250)->nullable();
            // CONSERVATION
            $table->string('conservation', 250)->nullable();
            // DESCRIPTION AND INTERPRETATION
            $table->double('fine_fraction_percent_sand', 10, 2)->nullable();
            $table->double('fine_fraction_percent_clay', 10, 2)->nullable();
            $table->double('fine_fraction_percent_clay_sandy', 10, 2)->nullable();
            $table->double('fine_fraction_percent_silty_clay', 10, 2)->nullable();
            $table->double('fine_fraction_percent_silt', 10, 2)->nullable();
            $table->double('fine_fraction_percent_clay_silt', 10, 2)->nullable();

            $table->double('coarse_fraction_percent_gravas', 10, 2)->nullable();
            $table->double('coarse_fraction_percent_cantos', 10, 2)->nullable();
            $table->double('coarse_fraction_percent_bloques', 10, 2)->nullable();

            $table->string('interpretation', 250)->nullable();

            // COMPOSITION
            $table->string('comp_organic_ash', 250)->nullable();
            $table->string('comp_organic_coal', 250)->nullable();
            $table->string('comp_organic_bone', 250)->nullable();
            $table->string('comp_organic_wood', 250)->nullable();

            $table->string('comp_inorganic_brick', 250)->nullable();
            $table->string('comp_inorganic_slag', 250)->nullable();
            $table->string('comp_inorganic_plastering', 250)->nullable();
            $table->string('comp_inorganic_mortar', 250)->nullable();
            $table->string('comp_inorganic_cal', 250)->nullable();
            $table->string('comp_inorganic_stone_trab', 250)->nullable();
            $table->string('comp_inorganic_tiles', 250)->nullable();
            $table->string('comp_inorganic_adobes', 250)->nullable();
            $table->string('comp_inorganic_plastic', 250)->nullable();

            // STRATIGRAPHY
            $table->string('stratigraphy_equal_to', 250)->nullable();
            $table->string('stratigraphy_equi_you_are_supported', 250)->nullable();
            $table->string('stratigraphy_it_relies_on', 250)->nullable();
            $table->string('stratigraphy_overed_by', 250)->nullable();
            $table->string('stratigraphy_covers_or_overlaps', 250)->nullable();
            $table->string('stratigraphy_filling_by', 250)->nullable();
            $table->string('stratigraphy_fill_in', 250)->nullable();
            $table->string('stratigraphy_cut_by', 250)->nullable();
            $table->string('stratigraphy_cut_to', 250)->nullable();

            // VOLUME OF MATERIAL
            $table->string('volume_of_material', 250)->nullable();

            // MATERIALES - Romano Republicano - RECUPERADOS - ESTRATO

            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stratum_cards');
    }
};
