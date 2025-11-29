<style>
    /* === FIXED SIDEBAR === */
    .sidebar-wrapper {
        width: 260px;
        flex-shrink: 0;          /* Supaya tidak mengecil */
    }

    /* === DESIGN SIDEBAR === */
    .sidebar {
        width: 260px;
        min-height: 100vh;
        background: #1f6f52;
        color: white;
        padding: 30px 20px;
        position: sticky;
        top: 0;
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
        transition: 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #15593f;
        font-weight: bold;
    }
</style>

<div class="sidebar-wrapper">
    <div class="sidebar">
        <h3>SITAMA</h3>

        <ul style="padding:0; margin:0; list-style:none;">

            {{-- ===========================
                 SIDEBAR MAHASISWA
            ============================ --}}
            @if(auth()->user()->role === 'mahasiswa')

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
                    class="{{ request()->routeIs('mahasiswa.pengaturan.*') ? 'active' : '' }}">
                        ⚙️ Pengaturan
                    </a>
                </li>

            {{-- ===========================
                 SIDEBAR DOSEN
            ============================ --}}
            @elseif(auth()->user()->role === 'dosen')

                <li>
                    <a href="{{ route('dosen.dashboard') }}"
                    class="{{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
                        🏠 Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ route('dosen.tugasakhir.index') }}"
                    class="{{ request()->routeIs('dosen.tugasakhir.*') ? 'active' : '' }}">
                        📄 Tugas Akhir
                    </a>
                </li>

                <li>
                    <a href="{{ route('dosen.pesan.index') }}"
                    class="{{ request()->routeIs('dosen.pesan.*') ? 'active' : '' }}">
                        💬 Pesan
                    </a>
                </li>

                <li>
                    <a href="{{ route('dosen.pengaturan.index') }}"
                    class="{{ request()->routeIs('dosen.pengaturan.*') ? 'active' : '' }}">
                        ⚙️ Pengaturan
                    </a>
                </li>

            @endif

        </ul>
    </div>
</div>
