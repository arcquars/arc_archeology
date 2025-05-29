<div>
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
                1
{{--                @livewire('projects.mural-stratigraphy-card')--}}
            @elseif ($componenteActivo === 'inventoryMaterialMuseumable')
                2
{{--                @livewire('projects.uuee.list-ue')--}}
            @elseif ($componenteActivo === 'inventoryMaterialCount')
                3
{{--                @livewire('projects.stratum-tab.list-stratum-tab')--}}
            @endif
        </div>
    </div>
</div>
