<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Notifikasi;
use App\Models\RiwayatPengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function show(Request $request, $id)
    {
        $pengajuan = Pengajuan::with([
            'dokumen',
            'survey',
            'activeSurvey',
            'monitoring',
            'riwayat',
        ])->findOrFail($id);

        $activeTab = $request->query('tab', 'ringkasan');
        $unreadCount = Notifikasi::where('is_read', false)->count();

        // Group documents by kategori
        $dokumenPerusahaan = $pengajuan->dokumen->where('kategori', 'perusahaan');
        $dokumenPerumahan = $pengajuan->dokumen->where('kategori', 'perumahan');
        $paketTeknis = $pengajuan->dokumen->where('kategori', 'paket_teknis')->first();

        return view('admin.pengajuan.show', compact(
            'pengajuan',
            'activeTab',
            'unreadCount',
            'dokumenPerusahaan',
            'dokumenPerumahan',
            'paketTeknis'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $request->validate([
            'status' => 'required|string',
            'tahap' => 'nullable|string',
        ]);

        $statusLama = $pengajuan->status;
        $pengajuan->status = $request->status;
        if ($request->filled('tahap')) {
            $pengajuan->tahap = $request->tahap;
        }
        $pengajuan->save();

        RiwayatPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'judul' => 'Status Pengajuan Diperbarui',
            'deskripsi' => "Status berubah dari '{$statusLama}' menjadi '{$pengajuan->status}'.",
            'oleh' => auth()->user()->name ?? 'Admin DPKP',
            'tanggal' => now()->translatedFormat('d F Y · H.i') . ' WIB',
        ]);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }
}
