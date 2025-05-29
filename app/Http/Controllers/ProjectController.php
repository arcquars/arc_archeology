<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $projects = Project::active()->paginate(config('app.paginate'));
        $query = Project::active();
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('acronym')) {
            $query->where('acronym', 'like', '%' . $request->input('acronym') . '%');
        }

        if ($request->has('expedient')) {
            $query->where('expedient', 'like', '%' . $request->input('expedient') . '%');
        }

        $projects = $query->orderBy('initial_date', 'desc')->paginate(config('app.paginate'))->withQueryString();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showSteps(Request $request, $projectId, &$step=1){
        if($step >6 || $step<1){
            $step = 1;
        }
        $project = Project::find($projectId);

        switch ($step){
            case 2  :
                return $this->materialsInventory($project, $step);
            case 3:
                return $this->preliminaryReport($project, $step);
            case 4:
                return $this->finalReport($project, $step);
            case 5:
                return $this->comments($project, $step);
            case 6:
                return $this->imageRepository($project, $step);
            default:
                return $this->showFieldWork($request, $project, $step);
        }

    }

    protected function materialsInventory(Project $project, int $step)
    {
        return view('projects.show_step_2', compact('project', 'step'));
    }

    protected function showFieldWork(Request $request, Project $project, int $step){
        $fieldWorkDoc = $request->has('fieldWorkDoc')? $request->input('fieldWorkDoc') : 1;
        return view('projects.show_step_1', compact('project', 'step', 'fieldWorkDoc'));
    }

    protected function preliminaryReport(Project $project, int $step)
    {
        return view('projects.show_step_3', compact('project', 'step'));
    }

    protected function finalReport(Project $project, int $step)
    {
        return view('projects.show_step_4', compact('project', 'step'));
    }

    protected function comments(Project $project, int $step)
    {
        $comments = Comment::active()->where('project_id', $project->id)->orderBy('c_date', 'asc')->limit(5)->get();
        return view('projects.show_step_5', compact('project', 'step', 'comments'));
    }

    protected function imageRepository(Project $project, int $step)
    {
        return view('projects.show_step_6', compact('project', 'step'));
    }

    public function savePreliminaryReport(int $projectId, Request $request){
        $project = Project::find($projectId);
        $project->preliminary_report = $request->has('preliminary_report')? $request->input('preliminary_report') : "";
        $project->save();

        return redirect()->route('projects.steps.show', ['projectId' => $projectId, 'step' => 3])->with('success', "Se actualizo correctamente Informe preliminar.");
    }

    public function saveFinalReport(int $projectId, Request $request){
        $project = Project::find($projectId);
        $project->final_report = $request->has('final_report')? $request->input('final_report') : "";
        $project->save();

        return redirect()->route('projects.steps.show', ['projectId' => $projectId, 'step' => 4])->with('success', "Se actualizo correctamente la Memoria definitiva.");
    }

    public function createComment(int $projectId, int $step, Request $request){
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::id();
        $comment->project_id = $projectId;
        $comment->save();

        return redirect()->route('projects.steps.show', ['projectId' => $projectId, 'step' => 5])->with('success', "Se creo correctamente el Comentario.");
    }
}
