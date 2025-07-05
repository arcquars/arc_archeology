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
        Schema::create('materials', function (Blueprint $table) {
            $table->id(); // Representa la clave primaria 'id'
            $table->integer('ue'); // UE/Nº Inv.
            $table->string('object'); // Objeto
            $table->string('century', 20)->nullable(); // Siglo
            $table->string('class', 100)->nullable(); // Clase
            $table->integer('fragments')->nullable(); // Fragmentos
            $table->string('form', 100)->nullable(); // Forma
            $table->decimal('piece_percentage', 5, 2)->nullable(); // % de la pieza
            $table->decimal('thickness', 8, 2)->nullable(); // Grosor
            $table->string('pasta')->nullable(); // Pasta
            $table->text('decoration')->nullable(); // Decoración

            $table->boolean('active')->default(1);
            $table->string('material_type', 80); // Discriminador: 'Ceramica', 'Azulejo', etc.

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
