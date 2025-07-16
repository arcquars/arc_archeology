<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Models\HumanRemainCard;
use App\Models\StratumCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithPagination;

class ListHumanRemainsCard extends Component
{
    use WithPagination;

    public $projectId;
    public string $f_intervention = '';
    public string $f_ue = '';

    public string $s_intervention = '';
    public string $s_ue = '';

    public string $sortBy = 'ue';
    public string $sortDirection = 'asc';

    protected $listeners = ['human-remain-clear-search' => 'clearSearch', 'reload-list-human-remain' => 'applySearch'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_intervention = $this->f_intervention;
        $this->s_ue = $this->f_ue;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_intervention = '';
        $this->s_ue = '';
        $this->f_intervention = '';
        $this->f_ue = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_intervention = $this->f_intervention;
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
        $humanRemainCard = HumanRemainCard::find($id);
        $title = 'Ficha de restos humanos';
        $pdf = Pdf::loadView('projects.export-pdf.human_remains_card_export', compact('title', 'humanRemainCard'));
        $pdf->setPaper('letter', 'portrait');
        $filename = 'reporte_human_card_' . $id . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render()
    {
        $humanRemainCards = HumanRemainCard::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_intervention || $this->s_ue, function ($query) {
                if ($this->s_intervention && $this->s_ue) {
                    $query->where('intervention', '=', $this->s_intervention)
                        ->where('ue', 'like', '%' . $this->s_ue . '%');
                } elseif ($this->s_intervention) {
                    $query->where('intervention', '=', $this->s_intervention);
                } elseif ($this->s_ue) {
                    $query->where('ue', 'like', '%' . $this->s_ue . '%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();
        return view('livewire.projects.human-remains-card.list-human-remains-card', compact('humanRemainCards'));
    }
}
