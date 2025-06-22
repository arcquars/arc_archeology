<div>
    <div class="modal fade @if($show) show @endif" id="catalogueArchitecturalDeleteModal" tabindex="-1" role="dialog" aria-labelledby="catalogueArchitecturalDeleteModalLabel" aria-hidden="@if(!$show) true @else false @endif" style="@if($show) display: block; @endif">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="deleteCatalogueArchitectural">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="catalogueArchitecturalDeleteModalLabel">Eliminar el Elemento arquitectonico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <p>Esta seguro que quiere eliminar el elemento arquitectonico: <b>{{ $catalogueArchitectural? $catalogueArchitectural->proceed_ue : "--" }}</b></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" wire:click="closeModal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-danger" >Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
