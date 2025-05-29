<div>
    <livewire:projects.field-work.delete-field-work />
    <livewire:projects.uuee.delete-ue />
    <livewire:projects.stratum-tab.delete-stratum-tab />
    <livewire:projects.structure-tab.delete-structure-tab />
    <livewire:projects.human-remains-card.delete-human-remains-card />
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
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'humanRemainsFile' ? 'active' : '' }}"
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
                @livewire('projects.structure-tab.list-structure-tab')
            @elseif ($componenteActivo === 'humanRemainsFile')
                @livewire('projects.human-remains-card.list-human-remains-card')
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
    {{-- Stratum tab --}}
    @elseif ($showCreateStratumCard)
        @livewire('projects.stratum-tab.create-stratum-tab', ['projectId' => $projectId])
    @elseif ($showUpdateStratumCard)
        @livewire('projects.stratum-tab.update-stratum-tab', ['stratumCardId' => $stratumCardId])
    @elseif ($showViewStratumCard)
        @livewire('projects.stratum-tab.view-stratum-tab', ['stratumCardId' => $stratumCardId])
    {{-- Structure tab --}}
    @elseif ($showCreateStructureTab)
        @livewire('projects.structure-tab.create-structure-tab', ['projectId' => $projectId])
    @elseif ($showUpdateStructureTab)
        @livewire('projects.structure-tab.update-structure-tab', ['structureTabId' => $structureTabId])
    @elseif ($showViewStructureTab)
        @livewire('projects.structure-tab.view-structure-tab', ['structureTabId' => $structureTabId])

    {{-- Human remain Card --}}
    @elseif ($showCreateHumanRemainCard)
        @livewire('projects.human-remains-card.create-human-remains-card', ['projectId' => $projectId])
    @elseif ($showUpdateHumanRemainCard)
        @livewire('projects.human-remains-card.update-human-remains-card', ['humanRemainCardId' => $humanRemainCardId])
    @elseif ($showViewHumanRemainCard)
        @livewire('projects.human-remains-card.view-human-remains-card', ['humanRemainCardId' => $humanRemainCardId])
    @endif

</div>
