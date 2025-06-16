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
        Schema::create('structure_tabs', function (Blueprint $table) {
            $table->id();
            // IDENTIFICACIÓN
            $table->date('i_date');
            $table->string('i_location_intervention', 250);
            $table->string('i_acronym', 250);
            $table->string('i_fact', 250);
            $table->integer('i_n_ue');
            $table->string('i_provisional_dating', 250)->nullable();
            $table->string('i_stratigraphic_reliability', 250)->nullable();
            $table->string('i_type', 250)->nullable();
            // CONSERVATION
            $table->string('conservation', 250)->nullable();
            // DESCRIPCIÓN E INTERPRETACIÓN
            $table->double('di_rigging', 10, 2)->nullable();
            $table->double('di_length', 10, 2)->nullable();
            $table->double('di_width', 10, 2)->nullable();
            $table->double('di_thick_height', 10, 2)->nullable();
            $table->double('di_orientation_degrees_1', 10, 2)->nullable();
            $table->double('di_orientation_degrees_2', 10, 2)->nullable();

            // DIMENSIONES EN CM DE LOS LADRILLOS (DE PARED O PAVIMENTO), TOMAR COMO MÍNIMO 25 EJEMPLOS DE PIEZAS COMPLETAS (si es posible).
            $table->double('dimension_brick_cm_length', 10, 2)->nullable();
            $table->double('dimension_brick_cm_width', 10, 2)->nullable();
            $table->double('dimension_brick_cm_thickness', 10, 2)->nullable();

            // Altura de las tapias
            $table->double('formwork_structures', 10, 2)->nullable();

            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_tabs');
    }
};
