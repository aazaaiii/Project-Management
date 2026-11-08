<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentStatusRequest;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::with('project.customer.user')
            ->when(request('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.payments.index', compact('payments'));
    }

    public function create(): View
    {
        $projects = Project::with('customer.user')->get();

        return view('admin.payments.create', compact('projects'));
    }

    public function store(StorePaymentRequest $request): RedirectResponse
    {
        Payment::create($request->validated());

        return redirect()->route('admin.payments.index')->with('success', 'Tagihan pembayaran berhasil dibuat.');
    }

    public function updateStatus(UpdatePaymentStatusRequest $request, Payment $payment): RedirectResponse
    {
        $payment->update($request->validated());

        return redirect()->route('admin.payments.index')->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        if ($payment->bukti_transfer) {
            Storage::disk('public')->delete($payment->bukti_transfer);
        }

        $payment->delete();

        return redirect()->route('admin.payments.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}