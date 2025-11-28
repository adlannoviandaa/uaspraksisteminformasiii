<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SITAMA')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GLOBAL FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: #f3f3f3;
            font-family: 'Montserrat', sans-serif;
        }

        .content-wrapper {
            background: white;
            border-radius: 10px;
            padding: 20px;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="d-flex">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- MAIN CONTENT --}}
        <main class="flex-grow-1 p-4">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
