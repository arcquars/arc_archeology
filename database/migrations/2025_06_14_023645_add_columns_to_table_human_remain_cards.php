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
        Schema::table('human_remain_cards', function (Blueprint $table) {
//            $table->string('associated_with', 250)->nullable();
//            $table->text('description')->nullable();
            $table->boolean('deposition_primary')->default(false);
            $table->boolean('deposition_secondary')->default(false);
            $table->boolean('deposition_ossuary')->default(false);
            $table->boolean('context_undertaker')->default(false);
            $table->boolean('context_secondary')->default(false);
            $table->boolean('conservation_good')->default(false);
            $table->boolean('conservation_partial_alterations')->default(false);
            $table->boolean('conservation_totally_altered')->default(false);
            $table->boolean('burial_single_grave')->default(false);
            $table->boolean('burial_communal_grave')->default(false);
            $table->string('relationship_equals', 250)->nullable();
            $table->string('relationship_attached', 250)->nullable();
            $table->string('relationship_covered_by', 250)->nullable();
            $table->string('relationship_filling_by', 250)->nullable();
            $table->string('relationship_cut_by', 250)->nullable();
            $table->string('relationship_equivalent_to', 250)->nullable();
            $table->string('relationship_attached_to', 250)->nullable();
            $table->string('relationship_covers_to', 250)->nullable();
            $table->string('relationship_fill_to', 250)->nullable();
            $table->string('relationship_cut_to', 250)->nullable();
            $table->string('periodization', 250)->nullable();
            $table->string('provisional_dating', 250)->nullable();
            $table->text('interpretation')->nullable();
            $table->string('dates', 250)->nullable();
            $table->string('author', 250)->nullable();
            $table->boolean('disposition_decubito_supino')->default(false);
            $table->boolean('disposition_decubito_lateral_der')->default(false);
            $table->boolean('disposition_decubito_lateral_izq')->default(false);
            $table->boolean('deposito_adorno_per')->default(false);
            $table->boolean('deposito_ceramica')->default(false);
            $table->boolean('deposito_armamento')->default(false);
            $table->boolean('deposito_fauna')->default(false);
            $table->boolean('deposito_semillas')->default(false);
            $table->boolean('brazos_ext_largo_cuerpo_izq')->default(false);
            $table->boolean('brazos_ext_largo_cuerpo_der')->default(false);
            $table->boolean('brazos_sobre_pelvis_izq')->default(false);
            $table->boolean('brazos_sobre_pelvis_der')->default(false);
            $table->boolean('brazos_sobre_pecho_izq')->default(false);
            $table->boolean('brazos_sobre_pecho_der')->default(false);
            $table->boolean('piernas_ext_izq')->default(false);
            $table->boolean('piernas_ext_der')->default(false);
            $table->boolean('piernas_semi_flex_izq')->default(false);
            $table->boolean('piernas_semi_flex_der')->default(false);
            $table->boolean('piernas_flexionada_izq')->default(false);
            $table->boolean('piernas_flexionada_der')->default(false);
            $table->text('obs_antropologicas')->nullable();
            $table->text('specify')->nullable();
            $table->text('observations')->nullable();

//            $table->boolean('')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('human_remain_cards', function (Blueprint $table) {
            $table->dropColumn('deposition_primary');
            $table->dropColumn('deposition_secondary');
            $table->dropColumn('deposition_ossuary');
            $table->dropColumn('');
            $table->dropColumn('');
            $table->dropColumn('');
            $table->dropColumn('');
            $table->dropColumn('');
            $table->dropColumn('');
        });
    }
};
