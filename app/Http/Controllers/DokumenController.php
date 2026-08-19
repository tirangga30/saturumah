<?php

namespace App\Http\Controllers;

use App\Models\DokumenPengajuan;
use App\Models\RiwayatPengajuan;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $dokumen = DokumenPengajuan::findOrFail($id);
        $request->validate([
            'status' => 'required|in:Sesuai,Perlu perbaikan,Belum diperiksa',
            'catatan' => 'nullable|string',
        ]);

        $dokumen->status = $request->status;
        if ($request->has('catatan')) {
            $dokumen->catatan = $request->catatan;
        }
        $dokumen->save();

        RiwayatPengajuan::create([
            'pengajuan_id' => $dokumen->pengajuan_id,
            'judul' => 'Verifikasi Dokumen: ' . $dokumen->nama_persyaratan,
            'deskripsi' => "Status dokumen diubah menjadi '{$dokumen->status}'" . ($request->catatan ? ". Catatan: {$request->catatan}" : ""),
            'oleh' => auth()->user()->name ?? 'Admin DPKP',
            'tanggal' => now()->translatedFormat('d F Y · H.i') . ' WIB',
        ]);

        return back()->with('success', 'Status dokumen ' . $dokumen->nama_persyaratan . ' berhasil diperbarui!');
    }
}
