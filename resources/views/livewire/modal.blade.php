<div>
    <div
        wire:ignore.self
        class="modal fade"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        role="dialog"
        id="livewireModal"
        x-data="{ showModal: @entangle('show').live }"
        x-init="
    console.log('ssss', showModal);
    $watch('showModal', value => {
        console.log('open cambió a:', value);
        if (value) {
            $('#livewireModal').modal('show');
        } else {
            $('#livewireModal').modal('hide');
        }
    });"
    >
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="close" wire:click="closeModal"  aria-label="Cerrar" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    {!! $content !!}--}}
                    @livewire('projects.create-project')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('openModal', event => {
                console.log('Evento openModal recibido en Alpine:', event.detail);
                showModal = true;
                title = event.detail.title;
                content = event.detail.content;
            });
        </script>
    </div>
</div>
