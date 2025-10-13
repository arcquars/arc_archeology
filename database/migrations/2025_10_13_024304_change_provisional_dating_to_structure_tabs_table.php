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
        \Illuminate\Support\Facades\DB::table('structure_tabs')
            ->whereNotNull('i_provisional_dating') // Solo revisamos los que tienen valor
            ->update(['i_provisional_dating' => null]);

        Schema::table('structure_tabs', function (Blueprint $table) {
            $table->date('i_provisional_dating')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('structure_tabs', function (Blueprint $table) {
            $table->string('i_provisional_dating')->change();
        });
    }
};
