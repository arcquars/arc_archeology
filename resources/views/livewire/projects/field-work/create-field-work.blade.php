<div class="card border border-info mb-2 mt-2">
    <form wire:submit.prevent="saveFieldWork">
        <div class="card-header p-2">Crear Ficha Estratigrafia mural</div>
        <div class="card-body text-secondary p-2">
            <h6 class="bg-info p-1">IDENTIFICACION</h6>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="cfw_msc_date">Fecha</label>
                    <input type="date" class="form-control form-control-sm @error('msc_date') is-invalid @enderror"
                           wire:model="msc_date" id="cfw_msc_date"
                    >
                    @error('msc_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 form-group">
                    <label for="cfw_floor">Planta</label>
                    <input type="text" class="form-control form-control-sm @error('floor') is-invalid @enderror"
                           wire:model="floor" id="cfw_floor"
                    >
                    @error('floor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 form-group">
                    <label for="cfw_stay">Estancia</label>
                    <input type="text" class="form-control form-control-sm @error('stay') is-invalid @enderror"
                           wire:model="stay" id="cfw_stay"
                    >
                    @error('stay')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 form-group">
                    <label for="cfw_quadrant">Cuadrante/Pared</label>
                    <input type="text" class="form-control form-control-sm @error('quadrant') is-invalid @enderror"
                           wire:model="quadrant" id="cfw_quadrant"
                    >
                    @error('quadrant')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Acrónimo</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Hecho</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">N° UE</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Datacion provisional</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Fiabilidad estratigráfica</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Tipo</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group">
                <h6 class="bg-info p-1 text-uppercase">Conservación</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Muy deficiente</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Deficiente</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Aceptable</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Satisfactoria</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Retirar</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Conservar</label>
                </div>
            </div>
            <h6 class="bg-info p-1 text-uppercase">Descripción e interpretación</h6>
            <textarea name="" id="" rows="3" class="form-control form-control-sm"></textarea>
            <br>
            <h6 class="bg-info p-1 text-uppercase">Componentes</h6>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Piedra</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label for="">Tipo</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Caracteristicas</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Talla/Trabajo</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Ladrillo</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label for="">Tipo</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Caracteristicas</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Medidas</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Aglutinante</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label for="">Tipo</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Caracteristicas</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-4 form-group">
                            <label for="">Juntas</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Tapial</h6>
                    <div class="row">
                        <div class="col md-6 form-group">
                            <label for="">Caja</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col md-6 form-group">
                            <label for="">Altura de los tablones</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="bg-info p-1 text-uppercase">Estratigrafía</h6>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Igual a</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Equivale</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Se le apoya</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Se apoya en</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Cubierto por</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Cubre o se superpone a</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Relleno por</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Rellena a</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Cortado por</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Corta a</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Croquis, planta, alzado, y seccion</label>
                    <input type="file" class="form-control form-control-sm" multiple />

                </div>
                <div class="col-md-6 form-group">
                    <label for="">Fotografias</label>
                    <input type="file" class="form-control form-control-sm" multiple />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Comentario</label>
                    <textarea  class="form-control form-control-sm" rows="4"></textarea>
                </div>
                <div class="col-md-3 form-group">
                    <label for="">N. de plano</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">N. Fotografia</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeCreateFieldWork')">Cerrar</button>
            <button class="btn btn-sm btn-primary" type="submit">Crear</button>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:load', () => {
            console.log('Componente cargado inicialmente.');
            inicializarPlugins();
        });
    </script>
</div>


