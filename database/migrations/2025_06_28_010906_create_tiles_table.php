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
        Schema::create('tiles', function (Blueprint $table) {
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade'); // Clave foránea y primaria
            $table->primary('material_id'); // Asegura que material_id sea también la clave primaria de esta tabla
            $table->decimal('side_max', 8, 2)->nullable(); // Lado máximo
            $table->decimal('side_min', 8, 2)->nullable(); // Lado mínimo
            $table->text('notes')->nullable(); // Notas
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiles');
    }
};
