<div>
    <livewire:projects.inventory-material.catalogue-architectural.delete-catalogue-architectural />
    <livewire:projects.inventory-material.museable.delete-museable />
    <livewire:projects.inventory-material.material-recount.delete-material-recount />
    <div class="row mt-2">
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'CatalogArchitecturalElements' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('CatalogArchitecturalElements')"
                >
                    1. Catalogo elementos arquitectónico
                </a>
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'inventoryMaterialMuseumable' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('inventoryMaterialMuseumable')"
                >
                    2. Inventario de materiales, museable
                </a>
                <a href="#" class="list-group-item list-group-item-action {{ $componenteActivo === 'inventoryMaterialCount' ? 'active' : '' }}"
                   wire:click="seleccionarComponente('inventoryMaterialCount')"
                >
                    3. Inventario de materiales, recuento
                </a>
            </div>
        </div>
        <div class="col-md-10">
            @if ($componenteActivo === 'CatalogArchitecturalElements')
                @livewire('projects.inventory-material.catalogue-architectural.list-catalogue-architectural', ['projectId' => $projectId])
            @elseif ($componenteActivo === 'inventoryMaterialMuseumable')
                @livewire('projects.inventory-material.museable.list-museable', ['projectId' => $projectId])
            @elseif ($componenteActivo === 'inventoryMaterialCount')
                @livewire('projects.inventory-material.material-recount.list-material-recount', ['projectId' => $projectId])
            @endif
        </div>
    </div>

    @if ($showCreateCatalogueArch)
        @livewire('projects.inventory-material.catalogue-architectural.create-catalogue-architectural', ['projectId' => $projectId])
    @elseif($showUpdateCatalogueArch)
        @livewire('projects.inventory-material.catalogue-architectural.update-catalogue-architectural', ['catalogueArchitecturalId' => $catalogueArchitecturalId])
    @elseif($showViewCatalogueArch)
        @livewire('projects.inventory-material.catalogue-architectural.view-catalogue-architectural', ['catalogueArchitectualId' => $catalogueArchitecturalId])
    @elseif($showCreateMaterialMuseable)
        @livewire('projects.inventory-material.museable.create-museable', ['projectId' => $projectId])
    @elseif($showUpdateMaterialMuseable)
        @livewire('projects.inventory-material.museable.update-museable', ['materialId' => $materialMuseableId])
    @elseif($showViewMaterialMuseable)
        @livewire('projects.inventory-material.museable.view-museable', ['materialId' => $materialMuseableId])
    @elseif($showCreateMaterialRecount)
        @livewire('projects.inventory-material.material-recount.create-material-recount', ['projectId' => $projectId])
    @elseif($showUpdateMaterialRecount)
        @livewire('projects.inventory-material.material-recount.update-material-recount', ['materialRecountId' => $materialRecountId])
    @elseif($showViewMaterialRecount)
        @livewire('projects.inventory-material.material-recount.view-material-recount', ['materialRecountId' => $materialRecountId])
    @endif
</div>
