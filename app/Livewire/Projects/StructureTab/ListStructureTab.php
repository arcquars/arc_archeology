<?php

namespace App\Livewire\Projects\StructureTab;

use App\Models\StructureTab;
use Livewire\Component;
use Livewire\WithPagination;

class ListStructureTab extends Component
{
    use WithPagination;

    public $projectId;
    public string $f_date = '';
    public string $f_n_ue = '';

    public string $s_date = '';
    public string $s_n_ue = '';

    public string $sortBy = 'i_date';
    public string $sortDirection = 'asc';

    protected $listeners = ['clear-structure-tab-clear-search' => 'clearSearch', 'reload-list-structure-tab' => 'applySearch'];

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

    public function render()
    {
        $structureTabs = StructureTab::query()
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
        return view('livewire.projects.structure-tab.list-structure-tab', compact('structureTabs'));
    }
}
