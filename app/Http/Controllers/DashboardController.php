<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengajuan::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('nama_pengembang', 'like', "%{$search}%")
                  ->orWhere('nama_perumahan', 'like', "%{$search}%");
            });
        }

        // Tahap filter
        if ($request->filled('tahap') && $request->tahap !== 'semua') {
            $query->where('tahap', $request->tahap);
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        $pengajuans = $query->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        // Statistics Cards (Matching mockup counts)
        $stats = [
            'pengajuan_baru' => 18,
            'verifikasi_teknis' => 12,
            'survey_terjadwal' => 7,
            'perlu_tindak_lanjut' => 5,
        ];

        $unreadCount = Notifikasi::where('is_read', false)->count();

        return view('admin.dashboard', compact('pengajuans', 'stats', 'unreadCount'));
    }

    public function exportCsv()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Antrean_Pengajuan_SATURUMAH_' . date('Ymd_His') . '.csv"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID Pengajuan', 'Nama Pengembang', 'Nama Perumahan', 'Tahap', 'Status', 'Terakhir Diperbarui']);

            $pengajuans = Pengajuan::all();
            foreach ($pengajuans as $p) {
                fputcsv($file, [
                    $p->id,
                    $p->nama_pengembang,
                    $p->nama_perumahan,
                    $p->tahap,
                    $p->status,
                    $p->updated_at ? $p->updated_at->format('d M Y H:i') : $p->diajukan_pada,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
