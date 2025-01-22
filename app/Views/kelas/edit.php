<h2>Edit Kelas</h2>

<!-- Menampilkan pesan error jika ada -->
<?php if (session()->get('error')): ?>
    <div class="alert alert-danger">
        <?= session()->get('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->get('success')): ?>
    <div class="alert alert-success">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<!-- Form untuk mengedit kelas -->
<form action="<?= site_url('/kelas/update/' . $kelas['id_kelas']) ?>" method="post">
    <?= csrf_field() ?>

    <div>
        <label for="nama_kelas">Nama Kelas:</label>
        <input type="text" name="nama_kelas" value="<?= old('nama_kelas', $kelas['nama_kelas']) ?>" required>
        <?php if (isset($errors['nama_kelas'])): ?>
            <div class="error"><?= $errors['nama_kelas'] ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Update</button>
</form>