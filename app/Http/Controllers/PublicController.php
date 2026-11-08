<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PublicController extends Controller
{
    public function home(): View
    {
        return view('public.home');
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function services(): View
    {
        return view('public.services');
    }

    public function howItWorks(): View
    {
        return view('public.how-it-works');
    }

    public function portfolio(): View
    {
        $portfolios = Portfolio::where('status', 'Published')
            ->latest()
            ->get();

        $testimonials = Testimonial::with(['customer.user', 'project'])
            ->where('status', 'Disetujui')
            ->latest()
            ->take(3)
            ->get();

        return view('public.portfolio', compact(
            'portfolios',
            'testimonials'
        ));
    }

    public function testimonials(): View
    {
        $testimonials = Testimonial::with('customer.user', 'project')
            ->where('status', 'Disetujui')
            ->latest()
            ->get();

        return view('public.testimonials', compact('testimonials'));
    }

    public function booking(): View|RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('public.booking');
    }

    public function storeBooking(StoreBookingRequest $request): RedirectResponse
    {
        $user = auth()->user();

        Booking::create([
            // customer_id pada tabel bookings mengarah ke users.id
            'customer_id' => $user->id,

            'nama' => $user->name,
            'email' => $user->email,
            'no_hp' => $user->no_whatsapp,
            'alamat' => $user->alamat,

            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_survey' => $request->tanggal_survey,
            'pesan' => $request->pesan,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('booking')
            ->with('success', 'Booking konsultasi Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }
}