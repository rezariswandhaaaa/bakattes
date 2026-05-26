<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class AdminVoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->get();
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.voucher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required|unique:vouchers,kode_voucher|max:50',
            'tipe' => 'required|in:NOMINAL,PERSEN',
            'potongan' => 'required|numeric|min:1',
            'kuota' => 'required|numeric|min:1',
            'expired_at' => 'nullable|date'
        ], [
            'kode_voucher.unique' => 'Kode voucher ini sudah pernah dibuat.'
        ]);

        // Ubah kode menjadi uppercase secara otomatis
        $data = $request->all();
        $data['kode_voucher'] = strtoupper($request->kode_voucher);

        Voucher::create($data);

        return redirect()->route('admin.voucher.index')->with('success', 'Voucher baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return back()->with('success', 'Voucher berhasil dihapus.');
    }
}
