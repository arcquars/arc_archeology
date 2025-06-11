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
        Schema::create('stratum_card_metas', function (Blueprint $table) {
            $table->id();

            // Romano Republicano
            $table->string('material_romano_iberico', 100)->nullable();
            $table->string('material_romano_campaniense_a', 100)->nullable();
            $table->string('material_romano_campaniense_b', 100)->nullable();
            $table->string('material_romano_beoboide', 100)->nullable();
            $table->string('material_romano_barniz_negro_g', 100)->nullable();
            $table->string('material_romano_lucernas', 100)->nullable();
            $table->string('material_romano_paredes_finas', 100)->nullable();
            $table->string('material_romano_anfora_italica', 100)->nullable();
            $table->string('material_romano_anforas_genericas', 100)->nullable();
            $table->string('material_romano_ceramica_gris', 100)->nullable();
            $table->string('material_romano_ceramica_cocina_g', 100)->nullable();
            $table->string('material_romano_ceramica_comun_a', 100)->nullable();
            $table->string('material_romano_ceramica_comun_m', 100)->nullable();
            // Islámico
            $table->string('material_islamico_verde_manganeso', 100)->nullable();
            $table->string('material_islamico_cuerda_seca_total', 100)->nullable();
            $table->string('material_islamico_ceramica_dorada', 100)->nullable();
            $table->string('material_islamico_bicromas', 100)->nullable();
            $table->string('material_islamico_cuerda_seca_parcial', 100)->nullable();
            $table->string('material_islamico_esgrafiada', 100)->nullable();
            $table->string('material_islamico_monocromas', 100)->nullable();
            $table->string('material_islamico_ceramica_comun', 100)->nullable();
            $table->string('material_islamico_ceramica_cocina', 100)->nullable();
            $table->string('material_islamico_candiles', 100)->nullable();
            $table->string('material_islamico_cantaros_tinajas', 100)->nullable();
            $table->string('material_islamico_arcaduces', 100)->nullable();
            $table->string('material_islamico_azulejos_alicatados', 100)->nullable();
            // Contemporáneo
            $table->string('material_contem_pisa', 100)->nullable();
            $table->string('material_contem_porcelana', 100)->nullable();
            $table->string('material_contem_ceramica_cocina', 100)->nullable();
            $table->string('material_contem_ceramica_comun_g', 100)->nullable();
            $table->string('material_contem_azulejos_g', 100)->nullable();
            $table->string('material_contem_pavimento_hidra', 100)->nullable();
            // Romano Imperial
            $table->string('recovered_romano_i_terra_sa', 100)->nullable();
            $table->string('recovered_romano_i_terra_ss', 100)->nullable();
            $table->string('recovered_romano_i_terra_sh', 100)->nullable();
            $table->string('recovered_romano_i_terra_sca', 100)->nullable();
            $table->string('recovered_romano_i_terra_scb', 100)->nullable();
            $table->string('recovered_romano_i_lucernas', 100)->nullable();
            $table->string('recovered_romano_i_paredes_finas', 100)->nullable();
            $table->string('recovered_romano_i_anfora_hispanica', 100)->nullable();
            $table->string('recovered_romano_i_anfora_africana', 100)->nullable();
            $table->string('recovered_romano_i_anfora_genericas', 100)->nullable();
            $table->string('recovered_romano_i_ceramica_cocina', 100)->nullable();
            $table->string('recovered_romano_i_ceramica_comun_afr', 100)->nullable();
            $table->string('recovered_romano_i_ceramica_comun_mesa_g', 100)->nullable();
            // Bajomedieval
            $table->string('recovered_bajomedieval_ceramica_gris', 100)->nullable();
            $table->string('recovered_bajomedieval_verde_manganeso', 100)->nullable();
            $table->string('recovered_bajomedieval_ceramica_azul', 100)->nullable();
            $table->string('recovered_bajomedieval_ceramica_dorada', 100)->nullable();
            $table->string('recovered_bajomedieval_azul_dorada', 100)->nullable();
            $table->string('recovered_bajomedieval_monocroma', 100)->nullable();
            $table->string('recovered_bajomedieval_ceramica_comun_g', 100)->nullable();
            $table->string('recovered_bajomedieval_ceramica_cocina', 100)->nullable();
            $table->string('recovered_bajomedieval_candiles', 100)->nullable();
            $table->string('recovered_bajomedieval_cantaros_tinajas', 100)->nullable();
            $table->string('recovered_bajomedieval_arcaduces', 100)->nullable();
            $table->string('recovered_bajomedieval_azulejos_alicatados', 100)->nullable();
            // Otros Materiales
            $table->string('recovered_om_vidrio', 100)->nullable();
            $table->string('recovered_om_hueso_trabajado', 100)->nullable();
            $table->string('recovered_om_material_const', 100)->nullable();
            $table->string('recovered_om_pinturas_murales', 100)->nullable();
            $table->string('recovered_om_yeserias', 100)->nullable();
            $table->string('recovered_om_metales', 100)->nullable();
            $table->string('recovered_om_monedas', 100)->nullable();
            $table->string('recovered_om_conducciones_hidra', 100)->nullable();
            $table->string('recovered_om_piedra_trabajada', 100)->nullable();
            // Romano Tardío
            $table->string('stratum_romano_t_sigilata_clara_b', 100)->nullable();
            $table->string('stratum_romano_t_sigilata_clara_c', 100)->nullable();
            $table->string('stratum_romano_t_derivada_sigilata_p', 100)->nullable();
            $table->string('stratum_romano_t_otras_ceramicas_f', 100)->nullable();
            $table->string('stratum_romano_t_lucernas', 100)->nullable();
            $table->string('stratum_romano_t_anfora_africana', 100)->nullable();
            $table->string('stratum_romano_t_anfora_oriental', 100)->nullable();
            $table->string('stratum_romano_t_anfora_genericas', 100)->nullable();
            $table->string('stratum_romano_t_ceramica_cocina_a', 100)->nullable();
            $table->string('stratum_romano_t_ceramica_comun_imp', 100)->nullable();
            // Moderno
            $table->string('stratum_modern_ceramica_azul', 100)->nullable();
            $table->string('stratum_modern_ceramica_dorada', 100)->nullable();
            $table->string('stratum_modern_ceramica_alcora', 100)->nullable();
            $table->string('stratum_modern_ceramica_cocina', 100)->nullable();
            $table->string('stratum_modern_ceramica_comun', 100)->nullable();
            $table->string('stratum_modern_azulejos_alica', 100)->nullable();

            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->unsignedBigInteger('stratum_card_id');
            $table->foreign('stratum_card_id')
                ->references('id')
                ->on('stratum_cards')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stratum_card_metas');
    }
};
