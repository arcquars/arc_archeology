<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class UpdateProject extends Component
{
    public bool $mostrarModal = false;
    public string $mensajeModal = '';

    protected $listeners = ['mostrarModal'];

    public function mostrarModal(string $mensaje = '¿Estás seguro?')
    {
        $this->mensajeModal = $mensaje;
        $this->mostrarModal = true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
        $this->mensajeModal = '';
    }

    public function confirmarAccion()
    {
        // Aquí va la lógica para la acción que se confirma en el modal
        session()->flash('mensaje', 'Acción confirmada: ' . $this->mensajeModal);
        $this->cerrarModal();
    }

    public function render()
    {
        return view('livewire.projects.update-project');
    }
}
