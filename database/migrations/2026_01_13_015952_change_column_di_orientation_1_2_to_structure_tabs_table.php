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
            $table->string('di_orientation_degrees_1')->nullable()->change();
            $table->string('di_orientation_degrees_2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('structure_tabs', function (Blueprint $table) {
            $table->double('di_orientation_degrees_1')->nullable()->change();
            $table->double('di_orientation_degrees_2')->nullable()->change();

        });
    }
};
