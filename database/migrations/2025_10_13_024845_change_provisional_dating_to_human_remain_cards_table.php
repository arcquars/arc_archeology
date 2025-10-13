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
        \Illuminate\Support\Facades\DB::table('human_remain_cards')
            ->whereNotNull('provisional_dating') // Solo revisamos los que tienen valor
            ->update(['provisional_dating' => null]);

        Schema::table('human_remain_cards', function (Blueprint $table) {
            $table->date('provisional_dating')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('human_remain_cards', function (Blueprint $table) {
            $table->string('provisional_dating')->change();
        });
    }
};
