<div class="row">
    <div class="col-md-12">
        <h5 class="bg-primary p-1 text-center mb-1">ESTRATO</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <h6 class="bg-primary p-1 text-center">Romano Tardío</h6>
        <div class="row">
            <div class="col-md-7">
                <label>27. Sigilata Clara b</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_b == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_b == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_b == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>28. Sigilata Clara C</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_c == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_c == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_sigilata_clara_c == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>29. Derivada Sigilata Paleocristiana</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_derivada_sigilata_p == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_derivada_sigilata_p == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_derivada_sigilata_p == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>30. Otras cerámicas Finas</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_otras_ceramicas_f == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_otras_ceramicas_f == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_otras_ceramicas_f == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>31. Lucernas</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_lucernas == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_lucernas == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_lucernas == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>32. Ánfora Africana</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_africana == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_africana == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_africana == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>33. Ánfora Oriental</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_oriental == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_oriental == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_oriental == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>34. Ánforas (Genéricas)</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_genericas == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_genericas == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_anfora_genericas == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>35. Cerámica Cocina Africana</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_cocina_a == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_cocina_a == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_cocina_a == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>36. Cerámica Común Importada</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_comun_imp == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_comun_imp == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_romano_t_ceramica_comun_imp == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h6 class="bg-primary p-1 text-center">Moderno</h6>
        <div class="row">
            <div class="col-md-7">
                <label>62. Cerámica Azul</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_azul == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_azul == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_azul == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>63. Cerámica Dorada</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_dorada == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_dorada == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_dorada == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>64. Cerámica de Alcora</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_alcora == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_alcora == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_alcora == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>65. Cerámica de Cocina</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_cocina == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_cocina == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_cocina == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>66. Cerámica Común</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_comun == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_comun == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_ceramica_comun == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <label>67. Azulejos y Alicatados</label>
            </div>
            <div class="col-md-5 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_azulejos_alica == 1) checked @endif
                    >
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_azulejos_alica == 2) checked @endif
                    >
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" disabled
                           @if($stratumCardMeta->stratum_modern_azulejos_alica == 3) checked @endif
                    >
                    <label class="form-check-label">3</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
{{--        <h6 class="bg-info p-1 text-center">Otras Cerámicas</h6>--}}
    </div>
</div>
