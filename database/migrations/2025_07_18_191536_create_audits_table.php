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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Quién hizo el cambio
            $table->string('event'); // 'created', 'updated', 'deleted'
            $table->morphs('auditable'); // Crea auditable_id (BIGINT) y auditable_type (VARCHAR)
            $table->json('old_values')->nullable(); // Valores antiguos
            $table->json('new_values')->nullable(); // Valores nuevos
            $table->text('url')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent', 1023)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
