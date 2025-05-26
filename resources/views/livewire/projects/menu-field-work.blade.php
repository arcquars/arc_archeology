<div>
    <livewire:projects.field-work.delete-field-work />
    <livewire:projects.uuee.delete-ue />
    <livewire:projects.stratum-tab.delete-stratum-tab />
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
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'listStratumTab' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('listStratumTab')"
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
                @livewire('projects.uuee.list-ue')
            @elseif ($componenteActivo === 'listStratumTab')
                @livewire('projects.stratum-tab.list-stratum-tab')
            @elseif ($componenteActivo === 'structureSheet')
                @livewire('projects.structure-sheet')
            @elseif ($componenteActivo === 'humanRemainsFile')
                @livewire('projects.human-remains-file')
            @endif
        </div>
    </div>

    @if ($showCreateFieldWork)
        @livewire('projects.field-work.create-field-work', ['projectId' => $projectId])
    @elseif ($showUpdateFieldWork)
        @livewire('projects.field-work.update-field-work', ['muralId' => $muralId])
    @elseif ($showViewFieldWork)
        @livewire('projects.field-work.view-field-work', ['muralId' => $muralId])
    @elseif ($showCreateUe)
        @livewire('projects.uuee.create-ue', ['projectId' => $projectId])
    @elseif ($showUpdateUe)
        @livewire('projects.uuee.update-ue', ['ueId' => $ueId])
    @elseif ($showViewUe)
        @livewire('projects.uuee.view-ue', ['ueId' => $ueId])
    @elseif ($showCreateStratumCard)
        @livewire('projects.stratum-tab.create-stratum-tab', ['projectId' => $projectId])
    @elseif ($showUpdateStratumCard)
        @livewire('projects.stratum-tab.update-stratum-tab', ['stratumCardId' => $stratumCardId])
    @elseif ($showViewStratumCard)
        @livewire('projects.stratum-tab.view-stratum-tab', ['stratumCardId' => $stratumCardId])
    @endif

</div>
