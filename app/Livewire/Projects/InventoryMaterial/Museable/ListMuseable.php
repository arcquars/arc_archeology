<?php

namespace App\Livewire\Projects\InventoryMaterial\Museable;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class ListMuseable extends Component
{
    use WithPagination;

    public $projectId;
    public string $f_object = '';
    public string $f_ue = '';

    public string $s_object = '';
    public string $s_ue = '';

    public string $sortBy = 'ue';
    public string $sortDirection = 'asc';

    protected $listeners = ['museable-remain-clear-search' => 'clearSearch', 'reload-list-museable-remain' => 'applySearch'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_object = $this->f_object;
        $this->s_ue = $this->f_ue;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_object = '';
        $this->s_ue = '';
        $this->f_object = '';
        $this->f_ue = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_object = $this->f_object;
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
        $material = Material::find($id);
        $title = 'FICHA INVENTARIO DE MATERIALES';
        $pdf = Pdf::loadView('projects.export-pdf.inventario-materiales-museable', compact('title', 'material'));
        $filename = 'reporte_inventary_materials_museable' . $id . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render()
    {
        $materials = Material::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_object || $this->s_ue, function ($query) {
                if ($this->s_object && $this->s_ue) {
                    $query->where('object', '=', $this->s_object)
                        ->where('ue', 'like', '%' . $this->s_ue . '%');
                } elseif ($this->s_object) {
                    $query->where('object', '=', $this->s_object);
                } elseif ($this->s_ue) {
                    $query->where('ue', 'like', '%' . $this->s_ue . '%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.inventory-material.museable.list-museable', compact('materials'));
    }
}
