<?php

namespace App\Livewire\Projects\StratumTab;

use App\Models\StratumCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithPagination;

class ListStratumTab extends Component
{
    use WithPagination;

    public $projectId;
    public string $f_date = '';
    public string $f_n_ue = '';

    public string $s_date = '';
    public string $s_n_ue = '';

    public string $sortBy = 'i_date';
    public string $sortDirection = 'asc';

    protected $listeners = ['lscClearSearch' => 'clearSearch', 'reload-list-stratum-tab' => 'applySearch'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_date = $this->f_date;
        $this->s_n_ue = $this->f_n_ue;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_date = '';
        $this->s_n_ue = '';
        $this->f_date = '';
        $this->f_n_ue = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_date = $this->f_date;
        $this->s_n_ue = $this->f_n_ue;
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
        $stratumCard = StratumCard::find($id);
        $title = 'Ficha de estrato';
        $pdf = Pdf::loadView('projects.export-pdf.stratum_card_export', compact('title', 'stratumCard'));
        $pdf->setPaper('letter', 'portrait');
        $filename = 'reporte_stratum_card_' . $id . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render()
    {
        $stratumCards = StratumCard::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_date || $this->s_n_ue, function ($query) {
                if ($this->s_date && $this->s_n_ue) {
                    $query->where('i_date', '=', $this->s_date)
                        ->where('i_n_ue', 'like', '%' . $this->s_n_ue . '%');
                } elseif ($this->s_date) {
                    $query->where('i_date', '=', $this->s_date);
                } elseif ($this->s_n_ue) {
                    $query->where('i_n_ue', 'like', '%' . $this->s_n_ue . '%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.stratum-tab.list-stratum-tab', compact('stratumCards'));
    }
}
