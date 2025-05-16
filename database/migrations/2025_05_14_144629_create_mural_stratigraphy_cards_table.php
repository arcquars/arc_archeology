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
        Schema::create('mural_stratigraphy_cards', function (Blueprint $table) {
            $table->id();

            $table->date('msc_date');
            $table->string('floor', 250)->nullable();
            $table->string('stay', 250)->nullable();
            $table->string('quadrant', 250)->nullable();
            $table->string('acronym', 250)->nullable();
            $table->string('fact', 250)->nullable();
            $table->string('n_ue', 250)->nullable();
            $table->string('provisional_dating', 250)->nullable();
            $table->string('stratigraphic_reliability', 250)->nullable();
            $table->string('identification_type', 250)->nullable();

            $table->string('preservation', 250)->nullable();

            $table->text('description')->nullable();

            $table->string('component_stone_type')->nullable();
            $table->string('component_stone_characteristics')->nullable();
            $table->string('component_stone_size')->nullable();

            $table->string('component_brick_type')->nullable();
            $table->string('component_brick_characteristics')->nullable();
            $table->string('component_brick_measures')->nullable();

            $table->string('component_binder_type')->nullable();
            $table->string('component_binder_characteristics')->nullable();
            $table->string('component_binder_joints')->nullable();

            $table->string('component_tapial_box')->nullable();
            $table->string('component_tapial_height')->nullable();

            $table->string('stratigraphy_equals_to')->nullable();
            $table->string('stratigraphy_equivalent')->nullable();
            $table->string('stratigraphy_it_is_supported')->nullable();
            $table->string('stratigraphy_rests_on')->nullable();
            $table->string('stratigraphy_covered_by')->nullable();
            $table->string('stratigraphy_covers_to')->nullable();
            $table->string('stratigraphy_filled_by')->nullable();
            $table->string('stratigraphy_fills_to')->nullable();
            $table->string('stratigraphy_cut_by')->nullable();
            $table->string('stratigraphy_cut_to')->nullable();

            $table->text('comments')->nullable();

            $table->string('num_flat')->nullable();
            $table->string('num_photography')->nullable();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mural_stratigraphy_cards');
    }
};
