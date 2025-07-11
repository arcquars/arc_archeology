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
        Schema::create('stratum_quotes', function (Blueprint $table) {
            $table->id();
            $table->double('surface', 10, 2);
            $table->string('information', 250)->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('stratum_card_id');
            $table->foreign('stratum_card_id')
                ->references('id')
                ->on('stratum_cards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stratum_quotes');
    }
};
