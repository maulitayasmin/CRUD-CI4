<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }

        .container img {
            max-width: 150px;
            border-radius: 8px;
            display: block;
            margin: 10px auto;
        }

        .info {
            margin-bottom: 10px;
        }

        .info strong {
            display: inline-block;
            width: 120px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Detail Mahasiswa</h1>
    <div class="container">
        <img src="/<?= $user['foto_mahasiswa']; ?>" alt="Foto Mahasiswa">
        <!-- <div class="info">
            <strong>ID:</strong> <?= $user['id_mahasiswa']; ?>
        </div> -->
        <div class="info">
            <strong>Nama:</strong> <?= $user['nama_mahasiswa']; ?>
        </div>
        <div class="info">
            <strong>Jenis Kelamin:</strong> <?= $user['jenis_kelamin']; ?>
        </div>
        <div class="info">
            <strong>Kelas:</strong>
            <td><?= $user['nama_kelas'] ?? 'Tidak ada kelas'; ?></td>
        </div>
        <div class="info">
            <strong>Foto KTM:</strong><br>
            <img src="/<?= $user['foto_ktm']; ?>" alt="Foto KTM">
        </div>
        <a href="/users">Kembali ke Daftar</a>
    </div>
</body>

</html>