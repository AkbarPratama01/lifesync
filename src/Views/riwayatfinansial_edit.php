<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Riwayat Finansial</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/sweetalert2.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
      <h1 class="text-center">Edit Riwayat Finansial</h1>
      <hr>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">Form Edit Riwayat Finansial</div>
        <div class="card-body">
          <!-- Form untuk edit riwayat shalat -->
          <form action="/financial_records/update/<?= $financial->id ?>" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control"
                value="<?= htmlspecialchars($financial->date) ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <input type="text" name="description" id="description" class="form-control"
                placeholder="Masukkan Keterangan" value="<?= htmlspecialchars($financial->description) ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Kategori</label>
              <input type="text" name="category" id="category" class="form-control" placeholder="Masukkan Kategori"
                value="<?= htmlspecialchars($financial->category) ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tipe</label>
              <select name="type" id="type" class="form-select" required>
                <option value="Pendapatan" <?= $financial->type == 'Pendapatan' ? 'selected' : '' ?>>Pendapatan</option>
                <option value="Pengeluaran" <?= $financial->type == 'Pengeluaran' ? 'selected' : '' ?>>Pengeluaran
                </option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Nominal</label>
              <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan Nominal"
                value="<?= htmlspecialchars($financial->nominal) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/financial_records" class="btn btn-secondary">Kembali</a>
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