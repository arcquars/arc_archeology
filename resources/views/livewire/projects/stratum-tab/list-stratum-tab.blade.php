<div>
    <h4>Fichas de estratos</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="iDate">Fecha</label>
            <input type="date" class="form-control form-control-sm" id="pUe" name="iDate"
                   wire:model.defer="f_date"
            >
        </div>
        <div class="col-md-3 form-group">
            <label for="pInue">N. UE</label>
            <input type="text" class="form-control form-control-sm" id="pInue"
                   wire:model.defer="f_n_ue"
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
                        wire:click="$dispatch('toggle-stratum-card-create',)"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('i_date')">
                Fecha
                @if ($sortBy === 'i_date')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('i_n_ue')">
                N. UE
                @if ($sortBy === 'i_n_ue')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col">
                Acronimo
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($stratumCards as $stratumCard)
            <tr>
                <td>{{ $stratumCard->i_date }}</td>
                <td>{{ $stratumCard->i_n_ue }}</td>
                <td>{{ $stratumCard->i_acronym }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-stratum-card-view', {stratumCardId: {{$stratumCard->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-stratum-card-update', {stratumCardId: {{$stratumCard->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteStratumCard', {stratumCardId: {{$stratumCard->id}} })">
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
        {{ $stratumCards->links() }}
    </div>
</div>
