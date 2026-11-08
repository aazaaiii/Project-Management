<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = auth()->user()->customer->projects()->latest()->paginate(10);

        return view('customer.projects.index', compact('projects'));
    }

    public function show(Project $project): View
    {
        abort_if($project->customer_id !== auth()->user()->customer->id, 403);

        $project->load(['progress' => fn ($q) => $q->latest('tanggal'), 'progress.photos', 'payments']);

        return view('customer.projects.show', compact('project'));
    }
}