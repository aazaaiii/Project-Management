<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        // customer_id pada bookings mengacu ke users.id
        $bookings = Booking::where('customer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.bookings.index', compact('bookings'));
    }

    public function create(): View
    {
        $user = auth()->user()->load('customer');

        return view('customer.bookings.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'tanggal_survey' => 'nullable|date|after_or_equal:today',
            'pesan' => 'nullable|string|max:2000',
        ]);

        $user = auth()->user();
        $customer = $user->customer;

        // Pastikan profil memiliki nomor WhatsApp.
        if (!$customer || !$customer->no_whatsapp) {
            return back()
                ->withInput()
                ->withErrors([
                    'profile' => 'Lengkapi nomor WhatsApp pada profil Anda sebelum melakukan booking.',
                ]);
        }

        Booking::create([
            'customer_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'no_hp' => $customer->no_whatsapp,
            'alamat' => $customer->alamat,
            'jenis_layanan' => $validated['jenis_layanan'],
            'tanggal_survey' => $validated['tanggal_survey'] ?? null,
            'pesan' => $validated['pesan'] ?? null,
        ]);

        return redirect()
            ->route('customer.bookings.index')
            ->with('success', 'Booking layanan berhasil dikirim!');
    }
}