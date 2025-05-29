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
        Schema::create('human_remain_cards', function (Blueprint $table) {
            $table->id();

            $table->string('intervention');
            $table->string('location');
            $table->string('ue');
            $table->string('fact');
            $table->boolean('type_inhumation')->default(false);
            $table->boolean('type_cremation')->default(false);
            $table->string('associated_with')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('human_remain_cards');
    }
};
