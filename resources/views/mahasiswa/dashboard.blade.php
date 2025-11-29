@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="card p-4 shadow-sm">

        <h4 class="fw-bold">📊 Progress Tugas Akhir</h4>
        <p class="text-muted">Menunjukkan sejauh mana Anda sudah menyelesaikan tiap tahap.</p>

        <table class="table table-bordered mt-3">
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
                    <td class="text-success fw-bold">✔ Disetujui</td>
                    <td>100%</td>
                </tr>
                <tr>
                    <td>Bab I - III</td>
                    <td class="text-warning fw-bold">⏳ Sedang Diproses</td>
                    <td>70%</td>
                </tr>
                <tr>
                    <td>Sidang</td>
                    <td class="text-danger fw-bold">❌ Belum</td>
                    <td>0%</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

@endsection
