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
        Schema::create('project_user', function (Blueprint $table) {
            $table->foreignId('project_id')
                ->constrained() // Crea un índice y una restricción de clave foránea
                ->onDelete('cascade'); // Opcional: Si un proyecto se elimina, las relaciones se eliminan.

            $table->foreignId('user_id')
                ->constrained() // Crea un índice y una restricción de clave foránea
                ->onDelete('cascade'); // Opcional: Si un usuario se elimina, las relaciones se eliminan.

            // Para asegurar que un par proyecto-usuario solo exista una vez
            $table->primary(['project_id', 'user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};
