<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT MONTSERRAT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar {
            background: #136f50;
            height: 100vh;
            width: 250px;
            padding: 25px;
            color: white;
            position: fixed;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            margin: 12px 0;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            color: #ccecd8;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
            background: #f5f5f5;
            min-height: 100vh;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Dashboard</h4>

    <a href="/admin/dashboard">📊 Beranda</a>
    <a href="/admin/tugas-akhir">📁 Tugas Akhir</a>
    <a href="/admin/pesan">💬 Pesan</a>
    <a href="/admin/pengaturan">⚙️ Pengaturan</a>

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button class="btn btn-light w-100">Keluar</button>
    </form>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
