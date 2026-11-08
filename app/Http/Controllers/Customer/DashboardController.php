<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            return view('customer.dashboard', [
                'totalProyek' => 0,
                'sedangBerjalan' => 0,
                'selesai' => 0,
                'totalInvoice' => 0,
                'projects' => collect(),
            ]);
        }

        $totalProyek = $customer->projects()->count();

        $sedangBerjalan = $customer->projects()
            ->where('status', 'Sedang Pengerjaan')
            ->count();

        $selesai = $customer->projects()
            ->where('status', 'Selesai')
            ->count();

        $totalInvoice = Payment::whereHas('project', function ($query) use ($customer) {
            $query->where('customer_id', $customer->id);
        })
            ->where('status', 'Diverifikasi')
            ->sum('jumlah');

        $projects = $customer->projects()
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact(
            'totalProyek',
            'sedangBerjalan',
            'selesai',
            'totalInvoice',
            'projects'
        ));
    }
}
