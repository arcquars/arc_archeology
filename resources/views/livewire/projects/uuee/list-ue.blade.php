<div>
    <h4>Listado de UUEEs</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="pUe">UE</label>
            <input type="text" class="form-control form-control-sm" id="pUe" name="ue"
                   wire:model.defer="f_ue"
            >
        </div>
        <div class="col-md-3 form-group">
            <label for="pCoveredBy">Cubierto por</label>
            <input type="text" class="form-control form-control-sm" id="pCoveredBy"
                   wire:model.defer="f_covered_by"
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
                        wire:click="$dispatch('toggle-ue-create',)"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('code')">
                UE
                @if ($sortBy === 'code')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('covered_by')">
                Cubierto por
                @if ($sortBy === 'covered_by')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;">
                Cubre a
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($ues as $ue)
            <tr>
                <td>{{ $ue->code }}</td>
                <td>{{ $ue->covered_by }}</td>
                <td>{{ $ue->covers_to }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-view-ue', {ueId: {{$ue->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-ue-update', {ueId: {{$ue->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteUe', {ueId: {{$ue->id}} })">
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
        {{ $ues->links() }}
    </div>
</div>
