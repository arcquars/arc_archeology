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
        Schema::table('structure_tabs', function (Blueprint $table) {
            $table->text('interpretation_description')->nullable();
            $table->string('stratigraphy_equals', 200)->nullable();
            $table->string('stratigraphy_support_provided', 200)->nullable();
            $table->string('stratigraphy_covered_by', 200)->nullable();
            $table->string('stratigraphy_filling_by', 200)->nullable();
            $table->string('stratigraphy_cut_by', 200)->nullable();
            $table->string('stratigraphy_equivale', 200)->nullable();
            $table->string('stratigraphy_supported_by', 200)->nullable();
            $table->string('stratigraphy_overlaps_or_covers', 200)->nullable();
            $table->string('stratigraphy_fill_in', 200)->nullable();
            $table->string('stratigraphy_cut_to', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('structure_tabs', function (Blueprint $table) {
            $table->dropColumn('interpretation_description');
            $table->dropColumn('stratigraphy_equals');
            $table->dropColumn('stratigraphy_support_provided');
            $table->dropColumn('stratigraphy_covered_by');
            $table->dropColumn('stratigraphy_filling_by');
            $table->dropColumn('stratigraphy_cut_by');
            $table->dropColumn('stratigraphy_equivale');
            $table->dropColumn('stratigraphy_supported_by');
            $table->dropColumn('stratigraphy_overlaps_or_covers');
            $table->dropColumn('stratigraphy_fill_in');
            $table->dropColumn('stratigraphy_cut_to');
        });
    }
};
