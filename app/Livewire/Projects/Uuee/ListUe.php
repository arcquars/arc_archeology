<?php

namespace App\Livewire\Projects\Uuee;

use App\Models\HumanRemainCard;
use App\Models\MuralStratigraphyCard;
use App\Models\StratumCard;
use App\Models\StructureTab;
use App\Models\Ue;
use Illuminate\Support\Facades\DB;
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

    public function render()
    {
        $muralStratigraphyCards = MuralStratigraphyCard::select(
            'id',
            'n_ue as ue',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_covers_to as covers_to',
            DB::raw("identification_type as interpretation"),
            DB::raw("'Estratigrafia Mural' as ticketType"),
            DB::raw("msc_date as cronologia")
        )->toBase();
        $stratumCards = StratumCard::select(
            'id',
            'i_n_ue as ue',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_overlaps_or_covers as covers_to',
            DB::raw("i_type as interpretation"),
            DB::raw("'Estrato' as ticketType"),
            DB::raw("i_date as cronologia")
        )->toBase();
        $structureTab = StructureTab::select(
            'id',
            'i_n_ue as ue',
            'stratigraphy_covered_by as covered_by',
            'stratigraphy_overlaps_or_covers as covers_to',
            DB::raw("i_type as interpretation"),
            DB::raw("'Restos Humanos' as ticketType"),
            DB::raw("i_date as cronologia")
        )->toBase();
        $humanRemainCard = HumanRemainCard::select(
            'id',
            'ue',
            'relationship_covered_by as covered_by',
            'relationship_covers_to as covers_to',
            'interpretation',
            DB::raw("'Estructura' as ticketType"),
            DB::raw("dates as cronologia")
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
