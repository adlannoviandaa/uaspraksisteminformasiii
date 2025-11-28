<style>
    .sidebar {
        width: 260px;
        min-height: 100vh;
        background: #1f6f52;
        color: white;
        padding: 30px 20px;
    }

    .sidebar h3 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 15px;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 15px;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #15593f;
        font-weight: bold;
    }
</style>

<div class="sidebar">
    <h3>SITAMA</h3>
    <ul style="padding:0; margin:0; list-style:none;">

        <li>
            <a href="{{ route('mahasiswa.dashboard') }}"
                class="{{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
                🏠 Beranda
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.tugasakhir.index') }}"
                class="{{ request()->routeIs('mahasiswa.tugasakhir.*') ? 'active' : '' }}">
                📄 Tugas Akhir
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.pilihandosen.index') }}"
                class="{{ request()->routeIs('mahasiswa.pilihandosen.*') ? 'active' : '' }}">
                👨‍🏫 Pilihan Dosen
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.pesan.index') }}"
                class="{{ request()->routeIs('mahasiswa.pesan.*') ? 'active' : '' }}">
                💬 Pesan
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.pengaturan.index') }}"
                class="{{ request()->routeIs('mahasiswa.pengaturan') ? 'active' : '' }}">
                ⚙️ Pengaturan
            </a>
        </li>
    </ul>
</div>
