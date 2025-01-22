<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            max-width: 800px;
            max-height: 600px;
            width: 100%;
            height: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
            line-height: 2;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 10px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Kelas</h2>

        <!-- Menampilkan Error Validasi -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/kelas/store') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Nama Kelas -->
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan nama kelas" required>
            </div>

            <!-- Deskripsi Kelas -->
            <!-- <div class="form-group">
                <label for="deskripsi_kelas">Deskripsi Kelas</label>
                <textarea id="deskripsi_kelas" name="deskripsi_kelas" rows="4" placeholder="Tambahkan deskripsi kelas (opsional)"></textarea>
            </div> -->

            <!-- Tombol Submit -->
            <div>
                <a href="<?= base_url('/kelas') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>