<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::with('user')
            ->when(request('search'), function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        // Cek apakah akun sudah terdaftar
        $user = User::where('email', $request->email)->first();

        if ($user) {

            // Jangan izinkan akun admin menjadi customer
            if ($user->role !== 'customer') {
                return back()
                    ->withErrors(['email' => 'Email tersebut digunakan oleh akun admin.'])
                    ->withInput();
            }

            // Cek apakah akun sudah masuk daftar customer
            if ($user->customer()->exists()) {
                return back()
                    ->withErrors(['email' => 'Akun ini sudah terdaftar sebagai customer.'])
                    ->withInput();
            }

        } else {

            // Buat akun baru jika email belum terdaftar
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'customer',
                'no_whatsapp' => $request->no_whatsapp,
                'alamat' => $request->alamat,
            ]);
        }

        // Tambahkan akun ke tabel customers
        $user->customer()->create([
            'no_whatsapp' => $request->no_whatsapp ?: $user->no_whatsapp,
            'alamat' => $request->alamat ?: $user->alamat,
        ]);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit(Customer $customer): View
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(StoreCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
                ? Hash::make($request->password)
                : $customer->user->password,
        ]);

        $customer->update([
            'no_whatsapp' => $request->no_whatsapp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->user->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Customer berhasil dihapus.');
    }
}
