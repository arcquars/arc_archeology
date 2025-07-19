<?php
// app/Traits/Auditable.php
namespace App\Traits;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

trait Auditable
{


    /**
     * Registra los listeners de eventos del modelo automáticamente.
     */
    public static function bootAuditable()
    {
        static::created(function ($model) {
            $model->recordAuditEvent('created');
        });

        static::updated(function ($model) {
            $model->recordAuditEvent('updated');
        });

        static::deleted(function ($model) {
            $model->recordAuditEvent('deleted');
        });
    }

    /**
     * Graba el evento de auditoría en la base de datos.
     */
    protected function recordAuditEvent(string $event)
    {
        Audit::create([
            'user_id'        => Auth::id(), // ID del usuario autenticado
            'event'          => $event,
            'auditable_id'   => $this->id,
            'auditable_type' => static::class,
            'old_values'     => $event === 'updated' ? $this->getOriginalChanges() : null,
            'new_values'     => $event !== 'deleted' ? $this->getDirtyChanges() : null,
            'url'            => request()->fullUrl(),
            'ip_address'     => request()->ip(),
            'user_agent'     => request()->userAgent(),
        ]);
    }

    /**
     * Obtiene solo los valores originales de los campos que cambiaron.
     */
    protected function getOriginalChanges(): array
    {
        return array_intersect_key($this->getOriginal(), $this->getDirty());
    }

    /**
     * Obtiene solo los valores nuevos de los campos que cambiaron.
     */
    protected function getDirtyChanges(): array
    {
        return $this->getDirty();
    }
}
