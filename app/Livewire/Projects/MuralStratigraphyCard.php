<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\WithPagination;

class MuralStratigraphyCard extends Component
{
    use WithPagination;

    #[Url(as: 'msc_date')]
    public string $f_msc_date = '';
    #[Url(as: 'floor')]
    public string $f_floor = '';

    public string $s_msc_date = '';
    public string $s_floor = '';

    public string $sortBy = 'msc_date';
    public string $sortDirection = 'asc';

    protected $listeners = ['mscClearSearch' => 'clearSearch'];

    public function mount()
    {
        // Al iniciar, copiar URL en inputs visibles
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
        $murals = \App\Models\MuralStratigraphyCard::query()
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
