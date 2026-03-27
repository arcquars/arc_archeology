<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PipeSeparatedArray implements CastsAttributes
{
    /**
     * Convierte el string "A|B|C" del DB a array al leer
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (empty($value)) {
            return [];
        }

        return explode('|', $value);
    }

    /**
     * Convierte el array ['A', 'B', 'C'] a string "A|B|C" al guardar
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if (is_array($value)) {
            // Filtra valores vacíos y une con pipe
            return implode('|', array_filter($value));
        }

        return (string) $value;
    }
}