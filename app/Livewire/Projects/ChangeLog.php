<?php

namespace App\Livewire\Projects;

use App\Models\Audit;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ChangeLog extends Component
{
    use WithPagination;

    public $projectId;

    public string $sortDirection = 'asc';

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        $auditsWithProjects = Audit::query()
            ->where('auditable_type', '=', Project::class)
            ->join('projects', 'audits.auditable_id', '=', 'projects.id')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->where('projects.id', '=', $this->projectId)
            ->select('audits.*', 'projects.name as project_name', 'projects.initial_date as project_date', 'users.name as username')
            ->orderBy('audits.created_at', 'desc')
            ->paginate(env('PAGINATE', 10))->withQueryString();
        ;
        return view('livewire.projects.change-log', compact('auditsWithProjects'));
    }
}
