@extends('layouts.main')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<h3 class="fw-bold mb-3">Dashboard Mahasiswa 👋 </h3>
<p class="text-muted mb-4">Menunjukkan sejauh mana Anda sudah menyelesaikan tiap tahap.</p>

<div class="card p-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tahap</th>
                <th>Status</th>
                <th>Progress</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Proposal</td>
                <td class="text-success fw-bold">Disetujui</td>
                <td>✔ 100%</td>
            </tr>
            <tr>
                <td>Bab I - III</td>
                <td>Sedang Diproses</td>
                <td>⏳ 70%</td>
            </tr>
            <tr>
                <td>Sidang</td>
                <td>Belum</td>
                <td>❌ 0%</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
