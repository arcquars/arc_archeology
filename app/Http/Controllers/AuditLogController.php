<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audit; // Asegúrate que tu modelo se llame Audit
use App\Models\User;
use Illuminate\Support\Str;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        // Iniciar la consulta base
        $query = Audit::with('user')->latest(); // Carga ansiosa y orden por defecto

        // Aplicar filtros basados en los datos de la petición GET
        if ($request->filled('filter_user')) {
            $query->where('user_id', $request->input('filter_user'));
        }

        if ($request->filled('filter_table')) {
            $query->where('auditable_type', $request->input('filter_table'));
        }

        if ($request->filled('filter_date_start')) {
            $query->whereDate('created_at', '>=', $request->input('filter_date_start'));
        }

        if ($request->filled('filter_date_end')) {
            $query->whereDate('created_at', '<=', $request->input('filter_date_end'));
        }

        // Paginar los resultados
        $audits = $query->paginate(15);

        // Mantener los valores de los filtros en los enlaces de paginación
        $audits->appends($request->all());

        // Obtener los datos para los dropdowns de los filtros
        $users = User::orderBy('name')->get();
        $auditableTypes = Audit::select('auditable_type')->distinct()->pluck('auditable_type');

        // Devolver la vista con los datos necesarios
        return view('audit.index', [
            'audits' => $audits,
            'users' => $users,
            'auditableTypes' => $auditableTypes,
        ]);
    }
}
