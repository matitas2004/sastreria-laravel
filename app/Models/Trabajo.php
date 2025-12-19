<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $table = 'trabajos';

    protected $fillable = [
        'tipo_prenda',
        'arreglo',
        'cliente_nombre',
        'cliente_telefono',
        'estado'
    ];

    // Obtener todos los trabajos
    static public function getTrabajos()
    {
        return self::all();
    }

    // Obtener un trabajo por ID
    static public function getTrabajoById($id)
    {
        return self::find($id);
    }

    // Crear un nuevo trabajo
    static public function createTrabajo($data)
    {
        return self::create($data);
    }

    // Actualizar un trabajo
    public function updateTrabajo($data)
    {
        return $this->update($data);
    }

    // Eliminar un trabajo
    static public function deleteTrabajo(Trabajo $trabajo)
    {
        $trabajo->delete();
    }
}
