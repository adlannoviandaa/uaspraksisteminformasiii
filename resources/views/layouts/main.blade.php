<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Dashboard Mahasiswa" }} - SITAMA</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #136f43;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 12px 0;
            font-size: 16px;
        }

        .sidebar a:hover {
            font-weight: bold;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="fw-bold mb-4">SITAMA</h3>

        <a href="/mahasiswa/dashboard">📊 Beranda</a>
        <a href="/mahasiswa/tugasakhir">📄 Tugas Akhir</a>
        <a href="/mahasiswa/pesan">✉️ Pesan</a>
        <a href="/mahasiswa/pengaturan">⚙️ Pengaturan</a>

        <hr class="mt-3 mb-2 text-white">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-light w-100 mt-2">🚪 Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
