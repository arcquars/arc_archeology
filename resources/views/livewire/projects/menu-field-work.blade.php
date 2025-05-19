<div>
    <div class="row mt-2">
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'muralStratigraphyCard' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('muralStratigraphyCard')"
                >
                    1. Ficha estratigrafia mural
                </a>
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'listUuEe' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('listUuEe')"
                >
                    2. Listado UU.EE.
                </a>
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'stratumCard' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('stratumCard')"
                >
                    3. Ficha de estrato
                </a>
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'structureSheet' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('structureSheet')"
                >
                    4. Ficha de estructura
                </a>
                <a class="list-group-item list-group-item-action {{ $componenteActivo === 'humanRemainsFile' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('humanRemainsFile')"
                >
                    5. Ficha restos humanos
                </a>
            </div>
        </div>
        <div class="col-md-10">
            @if ($componenteActivo === 'muralStratigraphyCard')
                @livewire('projects.mural-stratigraphy-card')
            @elseif ($componenteActivo === 'listUuEe')
                @livewire('projects.list-uu-ee')
            @elseif ($componenteActivo === 'stratumCard')
                @livewire('projects.stratum-card')
            @elseif ($componenteActivo === 'structureSheet')
                @livewire('projects.structure-sheet')
            @elseif ($componenteActivo === 'humanRemainsFile')
                @livewire('projects.human-remains-file')
            @endif
        </div>
    </div>

    @if ($showCreateFieldWork)
        @livewire('projects.field-work.create-field-work', ['projectId' => $projectId])
    @endif

    @if ($showViewFieldWork)
        @livewire('projects.field-work.view-field-work', ['muralId' => $muralId])
{{--        @livewire('projects.field-work.view-field-work')--}}
    @endif

</div>
