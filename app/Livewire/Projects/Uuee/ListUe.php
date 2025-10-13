<?php

namespace App\Livewire\Projects\Uuee;

use App\Models\HumanRemainCard;
use App\Models\MuralStratigraphyCard;
use App\Models\StratumCard;
use App\Models\StructureTab;
use App\Models\Ue;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithPagination;

class ListUe extends Component
{
    use WithPagination;

    public $projectId;

    public $mediaType = '';

    public string $f_ue = '';
    public string $f_covered_by = '';

    public string $s_ue = '';
    public string $s_covered_by = '';

    public string $sortBy = 'ue';
    public string $sortDirection = 'asc';

    protected $listeners = ['lueClearSearch' => 'clearSearch', 'reload-list-ue' => 'applySearch'];

    public function exportPdf(){
        $unionQuery = $this->construcQuery();
        $allTicket = null;
        if (is_null($unionQuery)) {
            $allTicket = collect([])->paginate(10);
        } else {
            $allTicket = $unionQuery
                ->orderBy($this->sortBy, $this->sortDirection)->get();
        }


        $title = 'LISTADO DE UNIDADES ESTRATIGRAFICAS';
        $pdf = Pdf::loadView('projects.export-pdf.list_ues_export', compact('title', 'allTicket'));
        $pdf->setPaper('letter', 'portrait');
        $filename = 'list_ues_' . $this->projectId . '_' . now()->format('Ymd_His') . '.pdf';
        return Response::streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_ue = $this->f_ue;
        $this->s_covered_by = $this->f_covered_by;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_ue = '';
        $this->s_covered_by = '';
        $this->f_ue = '';
        $this->f_covered_by = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_ue = $this->f_ue;
        $this->s_covered_by = $this->f_covered_by;
        $this->resetPage();
    }

    public function reloadViewUE($ueId){
        dd("xxxx:: " . $ueId);
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

    public function construcQuery(){
        $muralStratigraphyCards = MuralStratigraphyCard::select(
            'id',
            'n_ue as ue',
            'description',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_covers_to as covers_to',
            DB::raw("identification_type as interpretation"),
            DB::raw("'Estratigrafia Mural' as ticketType"),
            DB::raw("provisional_dating as cronologia")
        )->toBase();
        $stratumCards = StratumCard::select(
            'id',
            'i_n_ue as ue',
            'interpretation_description as description',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_overlaps_or_covers as covers_to',
            DB::raw("i_type as interpretation"),
            DB::raw("'Estrato' as ticketType"),
            DB::raw("i_provisional_dating as cronologia")
        )->toBase();
        $structureTab = StructureTab::select(
            'id',
            'i_n_ue as ue',
            'interpretation_description as description',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_overlaps_or_covers as covers_to',
            DB::raw("i_type as interpretation"),
            DB::raw("'Estructuras' as ticketType"),
            DB::raw("i_provisional_dating as cronologia")
        )->toBase();
        $humanRemainCard = HumanRemainCard::select(
            'id',
            'ue',
            'description',
            'relationship_covered_by as covered_by',
            'relationship_covers_to as covers_to',
            'interpretation',
            DB::raw("'Restos humanos' as ticketType"),
            DB::raw("provisional_dating as cronologia")
        )->toBase();

        $muralStratigraphyCards->where('active', 1)->where('project_id', $this->projectId)
            ->when($this->s_ue || $this->s_covered_by, function ($query) {
                if ($this->s_ue && $this->s_covered_by) {
                    $query->where('n_ue', '=', $this->s_ue)
                        ->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                } elseif ($this->s_ue) {
                    $query->where('n_ue', '=', $this->s_ue);
                } elseif ($this->s_covered_by) {
                    $query->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                }
            });

        $stratumCards->where('active', 1)->where('project_id', $this->projectId)
            ->when($this->s_ue || $this->s_covered_by, function ($query) {
                if ($this->s_ue && $this->s_covered_by) {
                    $query->where('i_n_ue', '=', $this->s_ue)
                        ->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                } elseif ($this->s_ue) {
                    $query->where('i_n_ue', '=', $this->s_ue);
                } elseif ($this->s_covered_by) {
                    $query->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                }
            });

        $structureTab->where('active', 1)->where('project_id', $this->projectId)
            ->when($this->s_ue || $this->s_covered_by, function ($query) {
                if ($this->s_ue && $this->s_covered_by) {
                    $query->where('i_n_ue', '=', $this->s_ue)
                        ->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                } elseif ($this->s_ue) {
                    $query->where('i_n_ue', '=', $this->s_ue);
                } elseif ($this->s_covered_by) {
                    $query->where('stratigraphy_covered_by', 'like', '%' . $this->s_covered_by . '%');
                }
            });
        $humanRemainCard->where('active', 1)->where('project_id', $this->projectId)
            ->when($this->s_ue || $this->s_covered_by, function ($query) {
                if ($this->s_ue && $this->s_covered_by) {
                    $query->where('ue', '=', $this->s_ue)
                        ->where('relationship_covered_by', 'like', '%' . $this->s_covered_by . '%');
                } elseif ($this->s_ue) {
                    $query->where('ue', '=', $this->s_ue);
                } elseif ($this->s_covered_by) {
                    $query->where('relationship_covered_by', 'like', '%' . $this->s_covered_by . '%');
                }
            });

        $unionQuery = $muralStratigraphyCards;
        $unionQuery->unionAll($stratumCards);
        $unionQuery->unionAll($structureTab);
        $unionQuery->unionAll($humanRemainCard);

        return $unionQuery;
    }

    public function render()
    {
        $unionQuery = $this->construcQuery();

        $allTicket = null;
        if (is_null($unionQuery)) {
            $allTicket = collect([])->paginate(10);
        } else {
            $allTicket = $unionQuery
                ->orderBy($this->sortBy, $this->sortDirection) // Ordena el resultado final
                ->paginate(env('PAGINATE', 10)); // Paginar 10 resultados por página
        }

        return view('livewire.projects.uuee.list-ue', compact('allTicket'));
    }
}
