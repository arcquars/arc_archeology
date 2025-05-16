<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $projectId)
    {
        $project = Project::find($projectId);

        $query = Ue::active()->where('project_id', $projectId);
        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }

        if ($request->has('covered')) {
            $query->where('covered_by', 'like', '%' . $request->input('covered') . '%');
        }

        $ues = $query->paginate(config('app.paginate'))->withQueryString();

        return view('ues.home', compact('project', 'ues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($projectId)
    {
        $project = Project::find($projectId);
        return view('ues.create', compact('project'));
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
    public function show(string $ueId)
    {
        $ue = Ue::find($ueId);
        return view('ues.show', compact('ue'));
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
}
