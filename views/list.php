<?php
include_once "controllers/HotelController.php";
$controller = new HotelController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hotel</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>

<header>
    <h1>🏨 Manajemen Hotel</h1>
    <span>Sistem Data Hotel</span>
</header>

<main>
    <div class="card">
        <div class="toolbar">
            <h2>Daftar Hotel</h2>
            <a href="views/tambah.php" class="btn btn-navy">+ Tambah Hotel</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Hotel</th>
                    <th>Lokasi</th>
                    <th>Bintang</th>
                    <th>Harga/Malam</th>
                    <th>Fasilitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php
if (!$data || $data->num_rows === 0): ?>
                <tr><td colspan="8"><div class="empty">Belum ada data hotel.</div></td></tr>
<?php else: $no = 1; while($row = $data->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['lokasi']; ?></td>
                    <td><?= $row['bintang']; ?> Bintang</td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?= $row['fasilitas']; ?></td>
                    <td><span class="badge badge-<?= $row['status']; ?>"><?= ucfirst($row['status']); ?></span></td>
                    <td>
                        <div class="actions">
                            <a href="views/edit.php?id=<?= $row['id']; ?>" class="btn btn-blue btn-sm">Edit</a>
                            <a href="index.php?hapus=<?= $row['id']; ?>" class="btn btn-red btn-sm"
                               onclick="return confirm('Yakin hapus hotel ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
<?php endwhile; endif; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>