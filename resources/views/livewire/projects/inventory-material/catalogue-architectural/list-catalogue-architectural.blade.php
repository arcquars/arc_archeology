<div>
    <h4>Catalogo elementos arquitectonico</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="intervention">Fecha</label>
            <input type="date" class="form-control form-control-sm" id="intervention"
                   wire:model.defer="f_fecha"
            >
        </div>
        <div class="col-md-3 form-group">
            <label for="pInue">N. UE</label>
            <input type="text" class="form-control form-control-sm" id="pInue"
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
                        wire:click="$dispatch('toggleCreateFieldWork')"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('proceed_date_admission')">
                Fecha
                @if ($sortBy === 'proceed_date_admission')
                    <i class="fas fa-caret-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('proceed_ue')">
                N. UE
                @if ($sortBy === 'proceed_ue')
                    <i class="fas fa-caret-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                @endif
            </th>
            <th scope="col">
                Acronimo
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($catalogueArchitecturals as $catalogueArchitectural)
            <tr>
                <td>{{ $catalogueArchitectural->proceed_date_admission }}</td>
                <td>{{ $catalogueArchitectural->proceed_ue }}</td>
                <td>{{ $catalogueArchitectural->proceed_acronym }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="exportPdf({{$catalogueArchitectural->id}})">
                        <i class="fas fa-file-pdf"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleViewCatArch', {catalogueArchitecturalId: {{$catalogueArchitectural->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleUpdateCatArch', {catalogueArchitecturalId: {{$catalogueArchitectural->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteCatalogueArchitectural', {catalogueArchitecturalId: {{$catalogueArchitectural->id}} })">
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
        {{ $catalogueArchitecturals->links() }}
    </div>
</div>
