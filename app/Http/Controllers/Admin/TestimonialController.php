<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::with('customer.user', 'project')
            ->when(request('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['status' => 'Disetujui']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni disetujui.');
    }

    public function reject(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['status' => 'Ditolak']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni ditolak.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}