<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Importar Rule

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    // Reglas de validación para las contraseñas
    protected array $rules = [
        'current_password' => ['required', 'string'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        'new_password_confirmation' => ['required', 'string'],
    ];

    // Mensajes de validación personalizados (opcional)
    protected array $messages = [
        'current_password.required' => 'La contraseña actual es obligatoria.',
        'new_password.required' => 'La nueva contraseña es obligatoria.',
        'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
        'new_password.confirmed' => 'La nueva contraseña y su confirmación no coinciden.',
        'new_password_confirmation.required' => 'La confirmación de la nueva contraseña es obligatoria.',
    ];


    public function updatePassword()
    {
        // 1. Validar los campos del formulario
        $this->validate();

        // 2. Verificar que la contraseña actual sea correcta
        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'La contraseña actual es incorrecta.');
            return; // Detener la ejecución si la contraseña actual es incorrecta
        }

        // 3. Actualizar la contraseña del usuario
        auth()->user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        // 4. Limpiar los campos del formulario
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        // 5. Emitir un evento o mostrar un mensaje de éxito
        session()->flash('message', 'Contraseña actualizada exitosamente.');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
