<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        img {
            display: block;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
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
        <h1>Edit Data Mahasiswa</h1>

        <!-- Form untuk mengedit data -->
        <form action="/users/update/<?= $user['id_mahasiswa']; ?>" method="post" enctype="multipart/form-data">
            <label for="nama_mahasiswa">Nama:</label>
            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $user['nama_mahasiswa']; ?>" required>

            <label for="foto_mahasiswa">Foto Saat Ini:</label>
            <img id="current-image-mahasiswa" src="/<?= $user['foto_mahasiswa']; ?>" alt="Foto Mahasiswa" style="width: 150px; height: auto;">

            <label for="foto_mahasiswa">Ganti Foto:</label>
            <input type="file" id="foto_mahasiswa" name="foto_mahasiswa" accept="image/*" onchange="previewImage(event)">

            <label for="foto_ktm">Foto Saat Ini:</label>
            <img id="current-image-ktm" src="/<?= $user['foto_ktm']; ?>" alt="Foto KTM" style="width: 150px; height: auto;">

            <label for="foto_ktm">Ganti Foto:</label>
            <input type="file" id="foto_ktm" name="foto_ktm" accept="image/*" onchange="previewImage(event)">

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Pria" <?= $user['jenis_kelamin'] === 'Pria' ? 'selected' : ''; ?>>Pria</option>
                <option value="Perempuan" <?= $user['jenis_kelamin'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            <label for="id_kelas">Kelas:</label>
            <select id="id_kelas" name="id_kelas" required>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['id_kelas']; ?>" <?= $user['id_kelas'] == $class['id_kelas'] ? 'selected' : ''; ?>><?= $class['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('current-image');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>