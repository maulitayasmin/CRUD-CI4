<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
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
    <div class="form-container">
        <h1>Tambah Mahasiswa</h1>
        <form action="/users/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Nama -->
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa" required>

            <!-- Foto -->
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto_mahasiswa" accept="image/*" required>

            <!-- Foto -->
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto_ktm" accept="image/*" required>

            <!-- Jenis Kelamin -->
            <label for="jenis-kelamin">Jenis Kelamin</label>
            <select id="jenis-kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <!-- Kelas -->
            <label for="kelas">Kelas</label>
            <select id="kelas" name="id_kelas" required>
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $k): ?>
                    <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Simpan</button>
        </form>

    </div>
</body>

</html>