<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SITAMA</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-success d-flex justify-content-center align-items-center" style="height:100vh">

<div class="bg-white p-4 rounded shadow" style="width:380px">
    <h3 class="text-center mb-3 fw-bold">Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger py-2">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <input type="text" name="nim" class="form-control mb-3" placeholder="Masukkan NIM" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Kata Sandi" required>

        <select name="role" class="form-control mb-3" required>
            <option selected disabled>Pilih Role</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="admin">Admin</option>
        </select>

        <button class="btn btn-success w-100">Masuk</button>
    </form>
</div>

</body>
</html>
