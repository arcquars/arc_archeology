<div>
    <h4>Inventario de materiales, recuento</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="imm-ue">N. UE</label>
            <input type="text" class="form-control form-control-sm" id="imm-ue"
                   wire:model.defer="f_ue"
            >
        </div>
        <div class="col-md-3 d-flex flex-column justify-content-end">
            <div class="form-group">
                <button class="btn btn-sm btn-primary" type="button" title="Buscar..."
                        wire:click="applySearch"
                >
                    <i class="fas fa-search"></i>
                </button>
                <button  class="btn btn-sm btn-primary" title="Limpiar filtros de busqueda" type="button"
                         wire:click="clearSearch"
                >
                    <i class="fas fa-eraser"></i>
                </button>
                <button class="btn btn-sm btn-primary" type="button" title="Crear nuevo "
                        wire:click="$dispatch('toggleCreateMaterialRecount')"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('ue')">
                N. UE
                @if ($sortBy === 'ue')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col">
                Cronología
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($materialRecounts as $material)
            <tr>
                <td>{{ $material->ue }}</td>
                <td>{{ $material->chronology }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="exportPdf({{$material->id}})">
                        <i class="fas fa-file-pdf"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleViewMaterialRecount', {materialRecountId: {{$material->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleUpdateMaterialRecount', {materialRecountId: {{$material->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteMaterialRecount', {materialRecountId: {{$material->id}} })">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No se encontraron registros.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $materialRecounts->links() }}
    </div>
</div>
