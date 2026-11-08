<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadPaymentProofRequest;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::whereHas('project', function ($query) {
            $query->where('customer_id', auth()->user()->customer->id);
        })->with('project')->latest()->paginate(10);

        return view('customer.payments.index', compact('payments'));
    }

    public function uploadProof(UploadPaymentProofRequest $request, Payment $payment): RedirectResponse
    {
        abort_if($payment->project->customer_id !== auth()->user()->customer->id, 403);

        $path = $request->file('bukti_transfer')->store('bukti-transfer', 'public');

        $payment->update([
            'bukti_transfer' => $path,
            'status' => 'Pending',
        ]);

        return redirect()->route('customer.payments.index')->with('success', 'Bukti transfer berhasil diupload, menunggu verifikasi admin.');
    }
}