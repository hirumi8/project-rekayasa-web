<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->paginate(6);

        return view('page.project', compact('projects'));
    }

    public function show(int $id): View
    {
        $project = Project::findOrFail($id);

        return view('page.project-detail', compact('project'));
    }
}
