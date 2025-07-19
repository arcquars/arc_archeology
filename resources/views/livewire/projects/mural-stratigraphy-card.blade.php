<div>
    <h4>Fichas estratigrafia mural</h4>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="pName">Fecha</label>
            <input type="date" class="form-control form-control-sm" id="pName" name="name"
                   wire:model.defer="f_msc_date"
            >
        </div>
        <div class="col-md-3 form-group">
            <label for="pAcronym">Planta</label>
            <input type="text" class="form-control form-control-sm" id="pAcronym"
                   wire:model.defer="f_floor"
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
                <button class="btn btn-sm btn-primary" type="button" title="Crear nuevo proyecto"
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
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('msc_date')">
                Fecha
                @if ($sortBy === 'msc_date')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col" style="cursor: pointer;" wire:click="updateSortBy('floor')">
                Piso
                @if ($sortBy === 'floor')
                    <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}-fill"></i>
                @endif
            </th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($murals as $mural)
            <tr>
                <td>{{ $mural->msc_date }}</td>
                <td>{{ $mural->floor }}</td>
                <td class="text-right">
                    <button class="btn btn-sm btn-primary" wire:click="exportPdf({{$mural->id}})">
                        <i class="fas fa-file-pdf"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleViewFieldWork', {muralId: {{$mural->id}} })">
                        <i class="far fa-eye"></i>
                    </button>
{{--                    <button class="btn btn-sm btn-primary" wire:click="reloadViewFieldWork({{ $mural->id }})">--}}
{{--                        <i class="far fa-eye"></i>--}}
{{--                    </button>--}}
                    <button class="btn btn-sm btn-primary" wire:click="$dispatch('toggleUpdateFieldWork', {muralId: {{$mural->id}} })">
                        <i class="far fa-edit"></i>
                    </button>
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{route('projects.show.mural.stratigraphy.card.log', ['muralStratigraphyCardId' => $mural->id])}}" target="_blank" class="btn btn-sm btn-info" title="Registro de cambios" >
                            <i class="fas fa-history"></i>
                        </a>
                    <button class="btn btn-sm btn-danger" type="button" wire:click="$dispatch('openModalDeleteFw', {muralId: {{$mural->id}} })">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endif
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
        {{ $murals->links() }}
    </div>
</div>
