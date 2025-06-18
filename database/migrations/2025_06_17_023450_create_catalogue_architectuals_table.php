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
        Schema::create('catalogue_architectuals', function (Blueprint $table) {
            $table->id();

            $table->integer('proceed_ue');
            $table->date('proceed_date_admission');
            $table->string('proceed_source_admission', 250)->nullable();
            $table->string('proceed_acronym', 250)->nullable();
            $table->string('proceed_origin', 250)->nullable();
            $table->string('c_classification', 250)->nullable();
            $table->string('c_common_name', 250)->nullable();
            $table->string('c_specific_name', 250)->nullable();
            $table->string('c_dating', 250)->nullable();
            $table->string('c_integrity_status', 250)->nullable();
            $table->string('a_acronyms', 250)->nullable();
            $table->string('a_location', 250)->nullable();
            $table->string('location', 250)->nullable();

            $table->date('location_date')->nullable();
            $table->text('location_notes')->nullable();

            $table->double('dimension_long', 10, 2)->nullable();
            $table->double('dimension_anch', 10, 2)->nullable();
            $table->double('dimension_alt', 10, 2)->nullable();
            $table->double('dimension_other', 10, 2)->nullable();

            $table->string('subject', 250)->nullable();
            $table->string('technique', 250)->nullable();
            $table->text('description')->nullable();
            $table->string('conservation_status', 250)->nullable();
            $table->text('comments')->nullable();
            $table->string('author', 250)->nullable();

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
        Schema::dropIfExists('catalogue_architectuals');
    }
};
