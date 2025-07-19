<?php

namespace App\Livewire\Projects;

use App\Models\Audit;
use Livewire\Component;
use Livewire\WithPagination;

class ChangeMuralStratigraphyCardLog extends Component
{
    use WithPagination;

    public $muralStratigraphyCardId;

    public function mount($muralCardId)
    {
        $this->muralStratigraphyCardId = $muralCardId;
    }

    public function render()
    {
        $audits = Audit::query()
            ->where('auditable_type', '=', \App\Models\MuralStratigraphyCard::class)
            ->join('mural_stratigraphy_cards', 'audits.auditable_id', '=', 'mural_stratigraphy_cards.id')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->where('mural_stratigraphy_cards.id', '=', $this->muralStratigraphyCardId)
            ->select('audits.*', 'mural_stratigraphy_cards.n_ue as ue', 'mural_stratigraphy_cards.msc_date as dates', 'users.name as username')
            ->orderBy('audits.created_at', 'desc')
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.change-mural-stratigraphy-card-log', compact('audits'));
    }
}
