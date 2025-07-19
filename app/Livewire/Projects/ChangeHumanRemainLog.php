<?php

namespace App\Livewire\Projects;

use App\Helpers\AuditHelper;
use App\Models\Audit;
use App\Models\HumanRemainCard;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ChangeHumanRemainLog extends Component
{
    use WithPagination;

    public $humanRemainId;

    public function mount($humanRemainId)
    {
        $this->humanRemainId = $humanRemainId;
    }

    public function render()
    {
        $audits = Audit::query()
            ->where('auditable_type', '=', HumanRemainCard::class)
            ->join('human_remain_cards', 'audits.auditable_id', '=', 'human_remain_cards.id')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->where('human_remain_cards.id', '=', $this->humanRemainId)
            ->select('audits.*', 'human_remain_cards.ue as ue', 'human_remain_cards.dates as dates', 'users.name as username')
            ->orderBy('audits.created_at', 'desc')
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.change-human-remain-log', compact('audits'));
    }

    private function auditsByType(){

    }
}
