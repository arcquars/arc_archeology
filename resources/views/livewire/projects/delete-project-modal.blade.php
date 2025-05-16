<div>
    <div class="modal fade @if($show) show @endif" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="projectDeleteModalLabel" aria-hidden="@if(!$show) true @else false @endif" style="@if($show) display: block; @endif">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="deleteProject">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="projectDeleteModalLabel">Eliminar Proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <p>Esta seguro que quiere eliminar el proyecto: <b>{{ $project? $project->name : "--" }}</b></p>
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

    @if (session()->has('mensaje'))
        <div class="alert alert-success mt-3">
            {{ session('mensaje') }}
        </div>
    @endif

</div>
