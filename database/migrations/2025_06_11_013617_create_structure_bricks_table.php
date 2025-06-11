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
        Schema::create('structure_bricks', function (Blueprint $table) {
            $table->id();

            $table->double('long', 10, 2);
            $table->double('width', 10, 2);
            $table->double('thick', 10, 2);

            $table->timestamps();

            $table->unsignedBigInteger('structure_tab_id');
            $table->foreign('structure_tab_id')
                ->references('id')
                ->on('structure_tabs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_bricks');
    }
};
