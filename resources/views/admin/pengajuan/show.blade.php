@extends('layouts.admin')

@section('title', 'Detail Pengajuan - ' . $pengajuan->nama_perumahan)

@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <span class="breadcrumb-separator">/</span>
    @if($activeTab == 'ringkasan')
        <span class="breadcrumb-current">Detail Pengajuan</span>
    @else
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'ringkasan']) }}">Detail Pengajuan</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-current">{{ ucfirst($activeTab) }}</span>
    @endif
</div>

<!-- Header Card Banner -->
<div class="detail-header-card">
    <div class="detail-header-top">
        <div class="detail-title-group">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 14px; font-weight: 700; color: var(--text-muted);">{{ $pengajuan->id }}</span>
                @if($pengajuan->status == 'Perlu perbaikan')
                    <span class="badge badge-yellow">Perlu perbaikan</span>
                @elseif($pengajuan->status == 'Terjadwal')
                    <span class="badge badge-blue">Terjadwal</span>
                @elseif($pengajuan->status == 'Final' || $pengajuan->status == 'Siap disetujui')
                    <span class="badge badge-green">{{ $pengajuan->status }}</span>
                @else
                    <span class="badge badge-gray">{{ $pengajuan->status }}</span>
                @endif
            </div>
            <h1>{{ $pengajuan->nama_perumahan }}</h1>
            <div class="detail-subtitle">
                {{ $pengajuan->nama_pengembang }} &middot; Tahap: {{ $pengajuan->tahap }}
            </div>
        </div>

        <div>
            @if($pengajuan->tahap == 'Persetujuan' || $pengajuan->status == 'Final')
                <form action="{{ route('monitoring.action', $pengajuan->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="persetujuan">
                    <button type="submit" class="btn btn-primary">
                        Lanjutkan Persetujuan &rarr;
                    </button>
                </form>
            @else
                <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'verifikasi']) }}" class="btn btn-primary">
                    Mulai verifikasi &rarr;
                </a>
            @endif
        </div>
    </div>

    <!-- Sub Navigation Tabs -->
    <div class="tabs-nav" style="margin-bottom: 0;">
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'ringkasan']) }}" class="tab-item {{ $activeTab == 'ringkasan' ? 'active' : '' }}">
            Ringkasan
        </a>
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'dokumen']) }}" class="tab-item {{ $activeTab == 'dokumen' ? 'active' : '' }}">
            Dokumen
        </a>
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'verifikasi']) }}" class="tab-item {{ $activeTab == 'verifikasi' ? 'active' : '' }}">
            Verifikasi
        </a>
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'survey']) }}" class="tab-item {{ $activeTab == 'survey' ? 'active' : '' }}">
            Survey
        </a>
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'monitoring']) }}" class="tab-item {{ $activeTab == 'monitoring' ? 'active' : '' }}">
            Monitoring
        </a>
        <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id, 'tab' => 'riwayat']) }}" class="tab-item {{ $activeTab == 'riwayat' ? 'active' : '' }}">
            Riwayat
        </a>
    </div>
</div>

<!-- Tab Content Included Dynamically -->
<div>
    @if($activeTab == 'ringkasan')
        @include('admin.pengajuan.tabs._ringkasan')
    @elseif($activeTab == 'dokumen')
        @include('admin.pengajuan.tabs._dokumen')
    @elseif($activeTab == 'verifikasi')
        @include('admin.pengajuan.tabs._verifikasi')
    @elseif($activeTab == 'survey')
        @include('admin.pengajuan.tabs._survey')
    @elseif($activeTab == 'monitoring')
        @include('admin.pengajuan.tabs._monitoring')
    @elseif($activeTab == 'riwayat')
        @include('admin.pengajuan.tabs._riwayat')
    @endif
</div>
@endsection
