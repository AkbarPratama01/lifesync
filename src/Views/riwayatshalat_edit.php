<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Riwayat Shalat</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/sweetalert2.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
      <h1 class="text-center">Edit Riwayat Shalat</h1>
      <hr>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">Form Edit Riwayat Shalat</div>
        <div class="card-body">
          <!-- Form untuk edit riwayat shalat -->
          <form action="/riwayat-shalat/update/<?= $shalat->id ?>" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control"
                value="<?= htmlspecialchars($shalat->date) ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Fajr</label>
              <select name="fajr" class="form-control" required>
                <option value="Ya" <?= $shalat->fajr == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $shalat->fajr == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Dhuhr</label>
              <select name="dhuhr" class="form-control" required>
                <option value="Ya" <?= $shalat->dhuhr == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $shalat->dhuhr == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Asr</label>
              <select name="asr" class="form-control" required>
                <option value="Ya" <?= $shalat->asr == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $shalat->asr == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Maghrib</label>
              <select name="maghrib" class="form-control" required>
                <option value="Ya" <?= $shalat->maghrib == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $shalat->maghrib == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Isha</label>
              <select name="isha" class="form-control" required>
                <option value="Ya" <?= $shalat->isha == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $shalat->isha == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/riwayat-shalat" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/jquery-3.6.0.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>