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
            $table->string('fine_fraction', 250)->nullable();
            $table->string('coarse_fraction', 250)->nullable();
            $table->text('interpretation_description')->nullable();
            $table->string('organic_composition', 250)->nullable();
            $table->string('inorganic_composition', 250)->nullable();
            $table->string('stratigraphy_equals', 250)->nullable();
            $table->string('stratigraphy_support_provided', 250)->nullable();
            $table->string('stratigraphy_covered_by', 250)->nullable();
            $table->string('stratigraphy_filling_by', 250)->nullable();
            $table->string('stratigraphy_cut_by', 250)->nullable();
            $table->string('stratigraphy_equivale', 250)->nullable();
            $table->string('stratigraphy_supported_by', 250)->nullable();
            $table->string('stratigraphy_overlaps_or_covers', 250)->nullable();
            $table->string('stratigraphy_fill_in', 250)->nullable();
            $table->string('stratigraphy_cut_to', 250)->nullable();
            $table->text('comment')->nullable();
            $table->string('volume_material', 250)->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stratum_cards', function (Blueprint $table) {
            $table->dropColumn('fine_fraction');
            $table->dropColumn('coarse_fraction');
            $table->dropColumn('interpretation_description');
            $table->dropColumn('organic_composition');
            $table->dropColumn('inorganic_composition');
            $table->dropColumn('stratigraphy_equals');
            $table->dropColumn('stratigraphy_support_provided');
            $table->dropColumn('stratigraphy_covered_by');
            $table->dropColumn('stratigraphy_filling_by');
            $table->dropColumn('stratigraphy_equivale');
            $table->dropColumn('stratigraphy_supported_by');
            $table->dropColumn('stratigraphy_overlaps_or_covers');
            $table->dropColumn('stratigraphy_fill_in');
            $table->dropColumn('stratigraphy_cut_to');
            $table->dropColumn('description');
        });
    }
};
