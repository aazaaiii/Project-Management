<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Models\Project;
use App\Models\ProjectProgress;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('customer.user')
            ->when(request('search'), function ($query, $search) {
                $query->where('nama_project', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.progress.index', compact('projects'));
    }

    public function show(Project $project): View
    {
        $project->load('progress.photos');

        return view('admin.progress.show', compact('project'));
    }

    public function store(StoreProgressRequest $request, Project $project): RedirectResponse
    {
        $progress = $project->progress()->create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'persentase' => $request->persentase,
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('progress-photos', 'public');

                $progress->photos()->create(['foto' => $path]);
            }
        }

        return redirect()->route('admin.progress.show', $project)->with('success', 'Progress berhasil ditambahkan.');
    }
}