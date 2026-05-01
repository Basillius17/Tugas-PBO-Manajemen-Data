<?php
include_once "../controllers/HotelController.php";
$controller = new HotelController();
$error = "";

if(isset($_POST['simpan'])) {
    $result = $controller->model->create(
        $_POST['nama'],
        $_POST['lokasi'],
        $_POST['bintang'],
        $_POST['harga'],
        $_POST['fasilitas'],
        $_POST['status']
    );
    if($result) {
        header("Location: ../index.php");
    } else {
        $error = "Gagal menyimpan data.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>🏨 Manajemen Hotel</h1>
    <span>Sistem Data Hotel</span>
</header>

<main>
    <div class="card">
        <div class="form-wrap">
            <h2>Tambah Hotel</h2>

            <?php if($error): ?>
            <div class="alert alert-error"><?= $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="field">
                    <label>Nama Hotel</label>
                    <input type="text" name="nama" placeholder="Masukkan nama hotel" required>
                </div>
                <div class="field">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Masukkan lokasi" required>
                </div>
                <div class="row2">
                    <div class="field">
                        <label>Bintang</label>
                        <select name="bintang">
                            <option value="1">1 Bintang</option>
                            <option value="2">2 Bintang</option>
                            <option value="3" selected>3 Bintang</option>
                            <option value="4">4 Bintang</option>
                            <option value="5">5 Bintang</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <select name="status">
                            <option value="tersedia">Tersedia</option>
                            <option value="penuh">Penuh</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label>Harga per Malam (Rp)</label>
                    <input type="number" name="harga" placeholder="Contoh: 500000" required>
                </div>
                <div class="field">
                    <label>Fasilitas</label>
                    <input type="text" name="fasilitas" placeholder="Contoh: WiFi, Pool, Breakfast">
                </div>
                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn btn-navy">Simpan</button>
                    <a href="../index.php" class="btn btn-grey">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>