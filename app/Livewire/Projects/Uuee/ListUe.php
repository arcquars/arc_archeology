<?php

namespace App\Livewire\Projects\Uuee;

use App\Models\Ue;
use Livewire\Component;
use Livewire\WithPagination;

class ListUe extends Component
{
    use WithPagination;

    public string $f_ue = '';
    public string $f_covered_by = '';

    public string $s_ue = '';
    public string $s_covered_by = '';

    public string $sortBy = 'code';
    public string $sortDirection = 'asc';

    protected $listeners = ['lueClearSearch' => 'clearSearch', 'reload-list-ue' => 'applySearch'];

    public function mount()
    {
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
        $ues = Ue::query()
        ->where('active', 1)
        ->when($this->s_ue || $this->s_covered_by, function ($query) {
            if ($this->s_ue && $this->s_covered_by) {
                $query->where('code', '=', $this->s_ue)
                    ->where('covered_by', 'like', '%' . $this->s_covered_by . '%');
            } elseif ($this->s_ue) {
                $query->where('code', '=', $this->s_ue);
            } elseif ($this->s_covered_by) {
                $query->where('covered_by', 'like', '%' . $this->s_covered_by . '%');
            }
        })
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.uuee.list-ue', compact('ues'));
    }
}
