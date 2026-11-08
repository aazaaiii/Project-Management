<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $customer = auth()->user()->customer;

        $testimonials = $customer->testimonials()->with('project')->latest()->paginate(10);
        $projects = $customer->projects()->where('status', 'Selesai')->get();

        return view('customer.testimonials.index', compact('testimonials', 'projects'));
    }

    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        auth()->user()->customer->testimonials()->create($request->validated());

        return redirect()->route('customer.testimonials.index')->with('success', 'Testimoni berhasil dikirim, menunggu persetujuan admin.');
    }
}