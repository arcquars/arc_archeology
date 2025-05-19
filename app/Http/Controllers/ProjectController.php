<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
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

    public function showSteps(Request $request, $projectId, $step=1){
        if($step >4 || $step<1){
            $step = 1;
        }

        $project = Project::find($projectId);

        switch ($step){
            case 2:
                break;
            default:
                $this->showFieldWork($request, $project);
                break;
        }

        return view('projects.show_step_1', compact('project', 'step'));
    }

    protected function showFieldWork(Request $request, Project $project){
        $fieldWorkDoc = $request->has('fieldWorkDoc')? $request->input('fieldWorkDoc') : 1;
        $step = 1;
        return view('projects.show_step_1', compact('project', 'step', 'fieldWorkDoc'));
    }
}
