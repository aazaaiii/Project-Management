<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::when(request('search'), function ($query, $search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create(): View
    {
        return view('admin.portfolios.create');
    }

    public function store(StorePortfolioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->judul) . '-' . uniqid();
        $data['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');

        $portfolio = Portfolio::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $portfolio->images()->create([
                    'image' => $file->store('portfolio', 'public'),
                    'urutan' => $index,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio): View
    {
        $portfolio->load('images');

        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(StorePortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->validated();

        if ($request->judul !== $portfolio->judul) {
            $data['slug'] = Str::slug($request->judul) . '-' . uniqid();
        }

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($portfolio->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');
        }

        $portfolio->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $portfolio->images()->create([
                    'image' => $file->store('portfolio', 'public'),
                    'urutan' => $portfolio->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        Storage::disk('public')->delete($portfolio->thumbnail);

        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    public function deleteImage(\App\Models\PortfolioImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}