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
        Schema::create('ceramics', function (Blueprint $table) {
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade'); // Clave foránea y primaria

            $table->primary('material_id'); // Asegura que material_id sea también la clave primaria de esta tabla
            $table->decimal('height', 8, 2)->nullable(); // Altura
            $table->decimal('diameter_base', 8, 2)->nullable(); // Ø base
            $table->decimal('diameter_mouth', 8, 2)->nullable(); // Ø boca
            $table->decimal('diameter_max', 8, 2)->nullable(); // Ø máximo
            $table->text('description')->nullable(); // Descripción
            $table->boolean('active')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceramics');
    }
};
