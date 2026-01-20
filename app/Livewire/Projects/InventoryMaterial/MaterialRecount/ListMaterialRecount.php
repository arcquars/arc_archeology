<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Models\MaterialRecount;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class ListMaterialRecount extends Component
{
    use WithPagination;

    public $projectId;
    public string $f_ue = '';

    public string $s_ue = '';

    public string $sortBy = 'ue';
    public string $sortDirection = 'asc';

    protected $listeners = ['material-recount-clear-search' => 'clearSearch', 'reload-list-material-recount' => 'applySearch'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_ue = $this->f_ue;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_ue = '';
        $this->f_ue = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_ue = $this->f_ue;
        $this->resetPage();
    }

    public function updateSortBy(string $field): void
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function exportPdf($id){
        $material = MaterialRecount::find($id);
        $title = 'FICHA INVENTARIO DE MATERIALES RECUENTO';
        $pdf = Pdf::loadView('projects.export-pdf.inventario-materiales-recuento', compact('title', 'material'));
        $filename = 'reporte_inventary_materials_recuento' . $id . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render()
    {
        $materialRecounts = MaterialRecount::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_ue, function ($query) {
                $query->where('ue', 'like', '%' . $this->s_ue . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.inventory-material.material-recount.list-material-recount', compact('materialRecounts'));
    }
}
