<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\User;
use App\Models\Project; // Asume que tienes este modelo
use Livewire\Attributes\On; // Para escuchar eventos
use Livewire\Attributes\Locked;

class UserSearchAssignModal extends Component
{
    #[Locked]
    public $projectId; // ID del proyecto al que se asignará el usuario

    public $searchTerm = '';
    public $role = 'editor';
    public $users = [];
    public $selectedUserId;
    public $selectedUserName;
    public $showModal = false; // Para controlar la visibilidad del modal directamente desde Livewire

    // Escucha un evento para abrir el modal y pasar el ID del proyecto
    #[On('openUserSearchModal')]
    public function openModal($projectId)
    {
        $this->resetModalData(); // Limpia datos de búsquedas anteriores
        $this->projectId = $projectId;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetModalData();
    }

    public function resetModalData()
    {
        $this->searchTerm = '';
        $this->users = [];
        $this->selectedUserId = null;
        $this->selectedUserName = null;
    }

    // Se ejecuta cada vez que $searchTerm cambia (gracias a wire:model.live)
    public function updatedSearchTerm()
    {
        Log::info("ssss: " . $this->role);
        if (strlen($this->searchTerm) >= 2) {
            $this->users = User::query()
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
                })
                ->when($this->role, function ($query, $role) {
                    $query->whereHas('roles', function ($q) use ($role) {
                        $q->where('name', $role);
                    });
                })
                ->take(5) // Limita los resultados para no sobrecargar
                ->get();
        } else {
            $this->users = [];
        }
        // Limpiar selección si la búsqueda cambia
        $this->selectedUserId = null;
        $this->selectedUserName = null;
    }

    public function selectUser(User $user)
    {
        $this->selectedUserId = $user->id;
        $this->selectedUserName = $user->name;
        $this->searchTerm = $user->name; // Opcional: actualiza el input con el nombre completo
        $this->users = []; // Limpia la lista de búsqueda
    }

    public function assignUser()
    {
        if (!$this->selectedUserId || !$this->projectId) {
            // Emitir un error o notificación
            session()->flash('error', 'Por favor, selecciona un usuario y asegúrate de que el proyecto es válido.');
            return;
        }

        $project = Project::find($this->projectId);
        $user = User::find($this->selectedUserId);

        if ($project && $user) {
            // Aquí la lógica de asignación. Ejemplo: relación muchos a muchos
            // Asegúrate de que la relación no exista ya para evitar duplicados si es necesario
            if (!$project->users()->where('id', $user->id)->exists()) {
                $project->users()->attach($user->id); // Asume una relación 'users' en el modelo Project
                session()->flash('success', "Usuario '{$user->name}' asignado al proyecto '{$project->name}' exitosamente.");
                $this->dispatch('userAssigned'); // Evento para que otros componentes reaccionen
                $this->dispatch('updateProjectId', value: $this->projectId);
            } else {
                session()->flash('info', "El usuario '{$user->name}' ya está asignado a este proyecto.");
            }
            $this->closeModal();
        } else {
            session()->flash('error', 'Proyecto o usuario no encontrado.');
        }
    }

    public function render()
    {
        return view('livewire.users.user-search-assign-modal');
    }
}
