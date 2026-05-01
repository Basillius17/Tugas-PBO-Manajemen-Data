<?php
include_once "../controllers/HotelController.php";
$controller = new HotelController();
$error = "";

$id   = $_GET['id'];
$data = $controller->model->getById($id);
$row  = $data->fetch_assoc();

if(isset($_POST['update'])) {
    $result = $controller->model->update(
        $id,
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
        $error = "Gagal mengupdate data.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel</title>
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
            <h2>Edit Hotel</h2>

            <?php if($error): ?>
            <div class="alert alert-error"><?= $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="field">
                    <label>Nama Hotel</label>
                    <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
                </div>
                <div class="field">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="<?= $row['lokasi']; ?>" required>
                </div>
                <div class="row2">
                    <div class="field">
                        <label>Bintang</label>
                        <select name="bintang">
                            <?php for($i=1; $i<=5; $i++): ?>
                            <option value="<?= $i; ?>" <?= $row['bintang']==$i ? 'selected' : ''; ?>><?= $i; ?> Bintang</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <select name="status">
                            <option value="tersedia" <?= $row['status']=='tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                            <option value="penuh"    <?= $row['status']=='penuh'    ? 'selected' : ''; ?>>Penuh</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label>Harga per Malam (Rp)</label>
                    <input type="number" name="harga" value="<?= $row['harga']; ?>" required>
                </div>
                <div class="field">
                    <label>Fasilitas</label>
                    <input type="text" name="fasilitas" value="<?= $row['fasilitas']; ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-blue">Update</button>
                    <a href="../index.php" class="btn btn-grey">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>