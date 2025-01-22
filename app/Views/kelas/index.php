<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th,
        td {
            padding: 10px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #eaeaea;
        }

        img {
            max-width: 80px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .action-buttons a {
            margin: 0 5px;
            padding: 5px 10px;
            color: #fff;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }

        .action-buttons a.edit {
            background-color: #28a745;
        }

        .action-buttons a.edit:hover {
            background-color: #218838;
        }

        .action-buttons a.delete {
            background-color: #dc3545;
        }

        .action-buttons a.delete:hover {
            background-color: #c82333;
        }

        .action-buttons a.create {
            padding: 8px 12px;
            font-size: 16px;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #666;
        }
    </style>
</head>

<body>
    <h1>Daftar Kelas</h1>
    <a href="/kelas/create" class="create">
        <i class="fas fa-plus"></i>Tambah Kelas
    </a>
    <!-- Tabel Data Kelas -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <!-- <th>Deskripsi</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kelas)): ?>
                <?php foreach ($kelas as $k): ?>
                    <tr>
                        <td><?= esc($k['id_kelas']) ?></td>
                        <td><?= esc($k['nama_kelas']) ?></td>
                        <td class="action-buttons">
                            <a href="/kelas/edit/<?= $k['id_kelas']; ?>" class="edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/kelas/delete/<?= $k['id_kelas']; ?>" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-data">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</body>

</html>