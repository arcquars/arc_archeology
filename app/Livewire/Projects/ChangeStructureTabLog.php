<?php

namespace App\Livewire\Projects;

use App\Models\Audit;
use Livewire\Component;
use Livewire\WithPagination;

class ChangeStructureTabLog extends Component
{
    use WithPagination;

    public $structureTabId;

    public function mount($structureTabId)
    {
        $this->structureTabId = $structureTabId;
    }

    public function render()
    {
        $audits = Audit::query()
            ->where('auditable_type', '=', \App\Models\StructureTab::class)
            ->join('structure_tabs', 'audits.auditable_id', '=', 'structure_tabs.id')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->where('structure_tabs.id', '=', $this->structureTabId)
            ->select('audits.*', 'structure_tabs.i_n_ue as ue', 'structure_tabs.i_date as dates', 'users.name as username')
            ->orderBy('audits.created_at', 'desc')
            ->paginate(env('PAGINATE', 10))->withQueryString();

        return view('livewire.projects.change-structure-tab-log', compact('audits'));
    }
}
