<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SITAMA</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-[#1DBF73] via-[#6ED9C7] to-[#D4FFFB] relative">

    <!-- Header -->
    <div class="absolute top-20 text-center w-full">
    <h1 class="text-white text-5xl font-bold tracking-wide drop-shadow-md leading-tight">
        SITAMA
    </h1>
    <p class="text-white mt-1 text-sm font-medium tracking-wide">
        Sistem Informasi Tugas Akhir Mahasiswa
    </p>
</div>



    <!-- Login Card -->
    <div class="bg-white shadow-xl p-10 rounded-2xl w-[420px] border border-gray-200 mt-16">

        <h2 class="text-center text-lg font-semibold mb-6 tracking-wide text-gray-800">LOGIN</h2>

        <form action="{{ route('login.action') }}" method="POST" class="space-y-4">
            @csrf

            <!-- NIM -->
            <input
                type="text"
                name="nim"
                placeholder="NIM/NPM"
                required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1DBF73]"
            >

            <!-- Password -->
            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1DBF73]"
            >

            <div class="text-left">
                <a href="#" class="text-blue-500 text-xs hover:underline">Lupa Password?</a>
            </div>

            <!-- Role -->
            <select
                name="role"
                required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 text-sm outline-none focus:ring-2 focus:ring-[#1DBF73]"
            >
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="admin">Admin</option>
            </select>

            <!-- Button -->
            <button
                type="submit"
                class="w-full py-3 bg-[#1DBF73] hover:bg-[#15925A] text-white font-semibold rounded-lg transition-all"
            >
                Masuk
            </button>

            @if (session('error'))
                <p class="text-red-500 text-xs text-center mt-2">{{ session('error') }}</p>
            @endif
        </form>

    </div>

</body>
</html>
