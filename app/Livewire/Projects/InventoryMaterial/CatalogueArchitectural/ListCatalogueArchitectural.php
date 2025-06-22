<?php

namespace App\Livewire\Projects\InventoryMaterial\CatalogueArchitectural;

use App\Models\CatalogueArchitectual;
use Livewire\Component;
use Livewire\WithPagination;

class ListCatalogueArchitectural extends Component
{
    use WithPagination;

    public $projectId;

    public string $f_date = '';
    public string $f_ue = '';

    public string $s_date = '';
    public string $s_ue = '';

    public string $sortBy = 'proceed_ue';
    public string $sortDirection = 'asc';

    protected $listeners = ['catalogue-architectural-clear-search' => 'clearSearch', 'reload-list-catalogue-archi' => 'applySearch'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->s_date = $this->f_date;
        $this->s_ue = $this->f_ue;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->s_date = '';
        $this->s_ue = '';
        $this->f_date = '';
        $this->f_ue = '';
        $this->resetPage();
    }

    public function applySearch(): void
    {
        $this->s_date = $this->f_date;
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

    public function render()
    {
        $catalogueArchitecturals = CatalogueArchitectual::query()
            ->where('active', 1)
            ->where('project_id', $this->projectId)
            ->when($this->s_date || $this->s_ue, function ($query) {
                if ($this->s_date && $this->s_ue) {
                    $query->where('proceed_date_admission', '=', $this->s_date)
                        ->where('proceed_ue', 'like', '%' . $this->s_ue . '%');
                } elseif ($this->s_date) {
                    $query->where('proceed_date_admission', '=', $this->s_date);
                } elseif ($this->s_ue) {
                    $query->where('proceed_ue', 'like', '%' . $this->s_ue . '%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.inventory-material.catalogue-architectural.list-catalogue-architectural', compact('catalogueArchitecturals'));
    }
}
