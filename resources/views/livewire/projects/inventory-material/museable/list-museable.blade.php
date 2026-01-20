<div>
    <h4>Inventario de inventario Mouseable</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="imm-object">Objecto</label>
            <input type="text" class="form-control form-control-sm" id="imm-object"
                   wire:model.defer="f_object"
            >
        </div>
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
                        wire:click="$dispatch('toggleCreateMuseable')"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('object')">
                Objeto
                @if ($sortBy === 'object')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('ue')">
                N. UE
                @if ($sortBy === 'ue')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col">
                Siglo
            </th>
            <th scope="col">
                Tipo
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($materials as $material)
            <tr>
                <td>{{ $material->object }}</td>
                <td>{{ $material->ue }}</td>
                <td>{{ $material->century }}</td>
                <td>{{ $material->material_type }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="exportPdf({{$material->id}})">
                        <i class="fas fa-file-pdf"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleViewMuseable', {materialId: {{$material->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleUpdateMuseable', {materialId: {{$material->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteMaterial', {materialId: {{$material->id}} })">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No se encontraron registros.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $materials->links() }}
    </div>
</div>
