<?php

namespace App\Livewire\Projects;

use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class MuralStratigraphyCard extends Component
{
    use WithPagination;

    public $projectId;

    #[Url(as: 'msc_date')]
    public string $f_msc_date = '';
    #[Url(as: 'floor')]
    public string $f_floor = '';

    public string $s_msc_date = '';
    public string $s_floor = '';

    public string $sortBy = 'msc_date';
    public string $sortDirection = 'asc';

    protected $listeners = ['mscClearSearch' => 'clearSearch', 'reload-mural-stratigraphy-card' => 'applySearch'];

    public function mount($projectId)
    {
        // Al iniciar, copiar URL en inputs visibles
        $this->projectId = $projectId;
        $this->s_msc_date = $this->f_msc_date;
        $this->s_floor = $this->f_floor;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_msc_date = '';
        $this->s_floor = '';
        $this->f_msc_date = '';
        $this->f_floor = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_msc_date = $this->f_msc_date;
        $this->s_floor = $this->f_floor;
        $this->resetPage();
    }

    public function reloadViewFieldWork($muralId){
        dd("xxxx:: " . $muralId);
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
        $muralStratigraphy = \App\Models\MuralStratigraphyCard::find($id);
        $title = 'ESTRATIGRAFÍA MURARIA';
        $pdf = Pdf::loadView('projects.export-pdf.field_work_export', compact('title', 'muralStratigraphy'));
        $pdf->setPaper('letter', 'portrait');
        $filename = 'reporte_mural_stratigraphy_' . $id . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render()
    {
        $murals = \App\Models\MuralStratigraphyCard::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_msc_date || $this->s_floor, function ($query) {
                if ($this->s_msc_date && $this->s_floor) {
                    // Si ambos parámetros tienen valor (AND)
                    $query->where('msc_date', '=', $this->s_msc_date)
                        ->where('floor', 'like', '%' . $this->s_floor . '%');
                } elseif ($this->s_msc_date) {
                    // Si solo $this->s_msc_date tiene valor
                    $query->where('msc_date', '=', $this->s_msc_date);
                } elseif ($this->s_floor) {
                    // Si solo $this->s_floor tiene valor
                    $query->where('floor', 'like', '%' . $this->s_floor . '%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.mural-stratigraphy-card', compact('murals'));
    }
}
