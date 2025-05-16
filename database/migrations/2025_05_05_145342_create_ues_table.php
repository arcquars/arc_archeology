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
        Schema::create('ues', function (Blueprint $table) {
            $table->id();

            $table->string('code', 120)->unique();
            $table->string('covered_by', 200);
            $table->string('covers_to', 200);
            $table->string('description', 250)->nullable();
            $table->string('interpreting', 250)->nullable();
            $table->string('dating', 250)->nullable();

            $table->boolean('active')->default(true);
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();

            // Definición de la llave foránea
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('set null');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ues');
    }
};
