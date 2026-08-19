<!-- Dokumen Perusahaan Card -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Dokumen Perusahaan - {{ $dokumenPerusahaan->count() }} persyaratan wajib</h2>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>PERSYARATAN</th>
                    <th>BERKAS AKTIF</th>
                    <th>TANGGAL &middot; UKURAN</th>
                    <th>STATUS</th>
                    <th style="text-align: right;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokumenPerusahaan as $doc)
                    <tr>
                        <td style="font-weight: 600;">{{ $doc->nama_persyaratan }}</td>
                        <td>
                            <a href="#" class="table-link" onclick="openDocModal({{ json_encode($doc) }}); return false;">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline; vertical-align: -2px; margin-right: 4px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                {{ $doc->nama_file }}
                            </a>
                        </td>
                        <td style="color: var(--text-muted);">{{ $doc->ukuran_file }}</td>
                        <td>
                            @if($doc->status == 'Sesuai')
                                <span class="badge badge-green">Sesuai</span>
                            @elseif($doc->status == 'Perlu perbaikan')
                                <span class="badge badge-yellow">Perlu perbaikan</span>
                            @else
                                <span class="badge badge-gray">Belum diperiksa</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <button class="btn btn-outline" style="padding: 4px 8px; font-size: 12px;" onclick="openDocModal({{ json_encode($doc) }})" title="Pratinjau / Verifikasi">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <a href="#" class="btn btn-outline" style="padding: 4px 8px; font-size: 12px;" title="Unduh">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Dokumen Perumahan Card -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Dokumen Perumahan - {{ $dokumenPerumahan->count() }} persyaratan wajib</h2>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>PERSYARATAN</th>
                    <th>BERKAS AKTIF</th>
                    <th>TANGGAL &middot; UKURAN</th>
                    <th>STATUS</th>
                    <th style="text-align: right;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokumenPerumahan as $doc)
                    <tr>
                        <td style="font-weight: 600;">{{ $doc->nama_persyaratan }}</td>
                        <td>
                            <a href="#" class="table-link" onclick="openDocModal({{ json_encode($doc) }}); return false;">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline; vertical-align: -2px; margin-right: 4px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                {{ $doc->nama_file }}
                            </a>
                        </td>
                        <td style="color: var(--text-muted);">{{ $doc->ukuran_file }}</td>
                        <td>
                            @if($doc->status == 'Sesuai')
                                <span class="badge badge-green">Sesuai</span>
                            @elseif($doc->status == 'Perlu perbaikan')
                                <span class="badge badge-yellow">Perlu perbaikan</span>
                            @else
                                <span class="badge badge-gray">Belum diperiksa</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <button class="btn btn-outline" style="padding: 4px 8px; font-size: 12px;" onclick="openDocModal({{ json_encode($doc) }})" title="Pratinjau / Verifikasi">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <a href="#" class="btn btn-outline" style="padding: 4px 8px; font-size: 12px;" title="Unduh">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Paket Dokumen Teknis Card -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Paket Dokumen Teknis</h2>
    </div>
    <div class="card-body">
        <div style="background-color: #f8fafc; border: 1px solid var(--border-color); border-radius: 10px; padding: 20px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
            <div>
                <div style="font-weight: 700; font-size: 15px; color: var(--text-main); margin-bottom: 4px;">
                    {{ $paketTeknis->nama_file ?? 'Paket_tekdok_GriyaMahardika.zip' }}
                </div>
                <div style="font-size: 13px; color: var(--text-muted);">
                    Diunggah {{ $paketTeknis->ukuran_file ?? '08 Mei 2025 · 24.8 MB · berisi 7 berkas' }}
                </div>
            </div>
            <div style="display: flex; gap: 10px;">
                <button class="btn btn-outline" onclick="alert('Membuka pratinjau dokumen paket teknis...');">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Pratinjau
                </button>
                <a href="#" class="btn btn-outline" onclick="alert('Mengunduh paket teknis .zip...'); return false;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </a>
            </div>
        </div>

        <div>
            <div style="font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 16px;">
                KATEGORI TEKNIS OPSIONAL &middot; 21 KATEGORI
            </div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px 24px; font-size: 13px; color: var(--text-main);">
                <div>&bull; Struktur dan pondasi</div>
                <div>&bull; Sistem air bersih</div>
                <div>&bull; Sistem air limbah</div>
                <div>&bull; Drainase kawasan</div>
                <div>&bull; Jaringan jalan</div>
                <div>&bull; Penerangan jalan umum</div>
                <div>&bull; Ruang terbuka hijau</div>
                <div>&bull; Sistem proteksi kebakaran</div>
                <div>&bull; Utilitas listrik</div>
                <div>&bull; Telekomunikasi</div>
                <div>&bull; Pengelolaan sampah</div>
                <div>&bull; Aksesibilitas difabel</div>
                <div>&bull; Fasilitas sosial</div>
                <div>&bull; Fasilitas umum</div>
                <div>&bull; Peta kontur</div>
                <div>&bull; Kajian geoteknik</div>
                <div>&bull; Kajian hidrologi</div>
                <div>&bull; Rencana mitigasi bencana</div>
                <div>&bull; Rencana pengelolaan lingkungan</div>
                <div>&bull; Rencana pemeliharaan</div>
                <div>&bull; Kajian transportasi</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dialog Verifikasi Dokumen -->
<div id="docVerificationModal" class="modal-backdrop" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="modalDocTitle">Verifikasi Dokumen</h3>
            <button onclick="closeDocModal()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: var(--text-muted);">&times;</button>
        </div>
        <form id="docStatusForm" method="POST" action="">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Persyaratan</label>
                    <input type="text" id="modalDocName" class="form-input" readonly style="background-color: #f8fafc;">
                </div>
                <div class="form-group">
                    <label class="form-label">File Berkas</label>
                    <input type="text" id="modalDocFile" class="form-input" readonly style="background-color: #f8fafc;">
                </div>
                <div class="form-group">
                    <label class="form-label">Status Verifikasi</label>
                    <select name="status" id="modalDocStatusSelect" class="form-select" required>
                        <option value="Sesuai">Sesuai (Diterima)</option>
                        <option value="Perlu perbaikan">Perlu Perbaikan</option>
                        <option value="Belum diperiksa">Belum Diperiksa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan Perbaikan / Evaluasi</label>
                    <textarea name="catatan" id="modalDocCatatan" class="form-textarea" placeholder="Tuliskan alasan perbaikan jika dokumen belum sesuai..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeDocModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Status Dokumen</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openDocModal(doc) {
        document.getElementById('modalDocTitle').innerText = 'Verifikasi ' + doc.nama_persyaratan;
        document.getElementById('modalDocName').value = doc.nama_persyaratan;
        document.getElementById('modalDocFile').value = doc.nama_file + ' (' + doc.ukuran_file + ')';
        document.getElementById('modalDocStatusSelect').value = doc.status;
        document.getElementById('modalDocCatatan').value = doc.catatan || '';
        
        var form = document.getElementById('docStatusForm');
        form.action = '/dokumen/' + doc.id + '/status';
        
        document.getElementById('docVerificationModal').style.display = 'flex';
    }

    function closeDocModal() {
        document.getElementById('docVerificationModal').style.display = 'none';
    }
</script>
