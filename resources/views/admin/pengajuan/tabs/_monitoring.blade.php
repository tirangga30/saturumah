@php
    $monitoring = $pengajuan->monitoring;
    $isFinal = ($monitoring && $monitoring->status_monitoring === 'Final');
@endphp

<div style="margin-bottom: 24px; display: flex; align-items: flex-start; justify-content: space-between;">
    <div>
        <h2 class="page-title" style="font-size: 22px;">Hasil Monitoring</h2>
        <p class="page-subtitle">{{ $pengajuan->id }} &middot; {{ $pengajuan->nama_perumahan }}</p>
    </div>
    <div>
        <form action="{{ route('monitoring.toggle', $pengajuan->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline" style="font-size: 13px; border-style: dashed; border-color: var(--primary-accent); color: var(--primary-accent);">
                Demo: ubah ke {{ $isFinal ? 'Draft' : 'Final' }}
            </button>
        </form>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
    <!-- Left Column: Ringkasan, Temuan, Foto Bukti -->
    <div style="display: flex; flex-direction: column; gap: 24px;">
        <!-- Ringkasan Monitoring Card -->
        <div class="card" style="margin-bottom: 0;">
            <div class="card-header">
                <h2 class="card-title">Ringkasan monitoring</h2>
            </div>
            <div class="card-body" style="padding: 0;">
                <table class="table" style="font-size: 13px;">
                    <tbody>
                        <tr>
                            <td style="width: 220px; color: var(--text-muted); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">Status monitoring</td>
                            <td style="font-weight: 700; color: var(--text-main); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">
                                @if($isFinal)
                                    <span class="badge badge-green">Final</span>
                                @else
                                    <span class="badge badge-gray">Draft</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="color: var(--text-muted); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">Tanggal survey</td>
                            <td style="font-weight: 700; color: var(--text-main); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">{{ $monitoring->tanggal_survey ?? '22 Mei 2025' }}</td>
                        </tr>
                        <tr>
                            <td style="color: var(--text-muted); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">Petugas Perwaskim</td>
                            <td style="font-weight: 700; color: var(--text-main); border-bottom: 1px solid var(--border-color); padding: 14px 24px;">{{ $monitoring->petugas_nama ?? 'Rahmat Hidayat, S.T.' }}</td>
                        </tr>
                        <tr>
                            <td style="color: var(--text-muted); padding: 14px 24px;">Hasil</td>
                            <td style="font-weight: 700; color: var(--text-main); padding: 14px 24px;">
                                {{ $monitoring->hasil ?? 'Perlu Evaluasi' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Temuan dan Kesimpulan Card -->
        <div class="card" style="margin-bottom: 0;">
            <div class="card-header">
                <h2 class="card-title">Temuan dan kesimpulan</h2>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 11px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">TEMUAN</div>
                    <p style="font-size: 14px; color: var(--text-main); line-height: 1.6;">
                        {{ $monitoring->temuan ?? 'Saluran drainase sisi timur belum sesuai detail rencana. Akses kendaraan pemadam perlu penegasan pada area tikungan blok C.' }}
                    </p>
                </div>

                <div style="margin-bottom: 20px;">
                    <div style="font-size: 11px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">KESIMPULAN</div>
                    <p style="font-size: 14px; color: var(--text-main); line-height: 1.6;">
                        {{ $monitoring->kesimpulan ?? 'Kawasan dapat dilanjutkan setelah perbaikan desain drainase dan penyampaian revisi gambar teknis.' }}
                    </p>
                </div>

                <div style="margin-bottom: 24px;">
                    <div style="font-size: 11px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">KESEPAKATAN</div>
                    <p style="font-size: 14px; color: var(--text-main); line-height: 1.6;">
                        {{ $monitoring->kesepakatan ?? 'Pengembang akan mengunggah revisi dalam 7 hari kerja.' }}
                    </p>
                </div>

                <!-- Alert Box -->
                <div class="alert-box">
                    <div class="alert-title">RENCANA TINDAK LANJUT WAJIB</div>
                    <div class="alert-text">
                        {{ $monitoring->rencana_tindak_lanjut ?? 'Perbarui gambar drainase dan lengkapi simulasi manuver kendaraan pemadam sebelum persetujuan dilanjutkan.' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Foto Bukti Card -->
        <div class="card" style="margin-bottom: 0;">
            <div class="card-header">
                <h2 class="card-title">Foto bukti</h2>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="height: 120px; background-color: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-muted);" onclick="alert('Pratinjau foto Drainase Sisi Timur');">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <span style="font-size: 12px; color: var(--text-muted); text-align: center;">Drainase sisi timur</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="height: 120px; background-color: #e7dfd5; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-muted);" onclick="alert('Pratinjau foto Akses Blok C');">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <span style="font-size: 12px; color: var(--text-muted); text-align: center;">Akses blok C</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="height: 120px; background-color: #dbe5e7; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-muted);" onclick="alert('Pratinjau foto Ruang Terbuka Hijau');">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <span style="font-size: 12px; color: var(--text-muted); text-align: center;">Ruang terbuka hijau</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Tindakan Card -->
    <div class="card" style="margin-bottom: 0;">
        <div class="card-header">
            <h2 class="card-title">Tindakan</h2>
        </div>
        <div class="card-body" style="display: flex; flex-direction: column; gap: 16px;">
            <form action="{{ route('monitoring.action', $pengajuan->id) }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="perbaikan">
                <button type="submit" class="btn btn-outline" style="width: 100%; padding: 12px;">
                    Kembali ke Perbaikan
                </button>
            </form>

            <form action="{{ route('monitoring.action', $pengajuan->id) }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="persetujuan">
                @if($isFinal)
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px;">
                        Lanjutkan Persetujuan
                    </button>
                @else
                    <button type="button" class="btn btn-primary btn-disabled" style="width: 100%; padding: 12px; background-color: #cbd5e1; border-color: #cbd5e1;" disabled>
                        Lanjutkan Persetujuan
                    </button>
                @endif
            </form>

            <p style="font-size: 12px; color: var(--text-muted); text-align: center; line-height: 1.5; margin-top: 4px;">
                Persetujuan hanya dapat dilanjutkan setelah monitoring berstatus <strong>Final</strong>.
            </p>
        </div>
    </div>
</div>
