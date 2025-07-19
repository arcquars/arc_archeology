<?php

namespace App\Livewire\Projects;

use App\Models\Audit;
use Livewire\Component;
use Livewire\WithPagination;

class ChangeStratumCardLog extends Component
{
    use WithPagination;

    public $stratumCard;

    public function mount($stratumCardId)
    {
        $this->stratumCard = $stratumCardId;
    }


    public function render()
    {
        $audits = Audit::query()
            ->where('auditable_type', '=', \App\Models\StratumCard::class)
            ->join('stratum_cards', 'audits.auditable_id', '=', 'stratum_cards.id')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->where('stratum_cards.id', '=', $this->stratumCard)
            ->select('audits.*', 'stratum_cards.i_n_ue as ue', 'stratum_cards.i_date as dates', 'users.name as username')
            ->orderBy('audits.created_at', 'desc')
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.change-stratum-card-log', compact('audits'));
    }
}
