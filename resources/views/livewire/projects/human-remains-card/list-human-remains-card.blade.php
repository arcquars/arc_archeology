<div>
    <h4>Fichas de restos humanos</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="intervention">Intervencion</label>
            <input type="text" class="form-control form-control-sm" id="intervention" name="intervention"
                   wire:model.defer="f_intervention"
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
                        wire:click="$dispatch('toggle-human-remain-card-create')"
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('intervention')">
                Intervencion
                @if ($sortBy === 'intervention')
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
                Hecho
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($humanRemainCards as $humanRemainCard)
            <tr>
                <td>{{ $humanRemainCard->intervention }}</td>
                <td>{{ $humanRemainCard->ue }}</td>
                <td>{{ $humanRemainCard->fact }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-human-remain-card-view', {humanRemainCardId: {{$humanRemainCard->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggle-human-remain-card-update', {humanRemainCardId: {{$humanRemainCard->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteHumanRemainCard', {humanRemainCardId: {{$humanRemainCard->id}} })">
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
        {{ $humanRemainCards->links() }}
    </div>
</div>
