<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jurnal Harian</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
      <h1 class="text-center">Edit Jurnal Harian</h1>
      <hr>
      <div class="card">
        <div class="card-header bg-primary text-white">Form Edit Jurnal</div>
        <div class="card-body">
          <form action="/jurnal-harian/update/<?= $journal->id ?>" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control"
                value="<?= htmlspecialchars($journal->date) ?>" required>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Judul</label>
              <input type="text" name="title" id="title" class="form-control"
                value="<?= htmlspecialchars($journal->title) ?>" required>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Konten</label>
              <textarea name="content" id="content" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->content) ?></textarea>
            </div>
            <div class="mb-3">
              <label for="emotions" class="form-label">Perasaan dan Emosi</label>
              <textarea name="emotions" id="emotions" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->emotions) ?></textarea>
            </div>
            <div class="mb-3">
              <label for="achievements" class="form-label">Pencapaian</label>
              <textarea name="achievements" id="achievements" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->achievements) ?></textarea>
            </div>
            <div class="mb-3">
              <label for="failures" class="form-label">Kegagalan</label>
              <textarea name="failures" id="failures" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->failures) ?></textarea>
            </div>
            <div class="mb-3">
              <label for="reflection" class="form-label">Renungan</label>
              <textarea name="reflection" id="reflection" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->reflection) ?></textarea>
            </div>
            <div class="mb-3">
              <label for="plans" class="form-label">Rencana untuk Esok</label>
              <textarea name="plans" id="plans" class="form-control" rows="5"
                required><?= htmlspecialchars($journal->plans) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/jurnal-harian" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>