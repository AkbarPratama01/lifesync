<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include 'sidebar.php'; ?>

  <div id="content" class="content">
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <div class="container mt-4">
      <h1>Selamat Datang, <?= htmlspecialchars($userName); ?>!</h1>
      <!-- <p>Email Anda: <?= htmlspecialchars($userEmail); ?></p> -->
      <hr>
      <!-- Finansial Card -->
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-primary mb-4">Buat Teransaksi</button>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h4>Pendapatan</h4>
              <p><?php echo $formattedPendapatan; ?></p>
              <!-- <button class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> Detail</button> -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h4>Pengeluaran</h4>
              <p><?php echo $formattedPengeluaran; ?></p>
              <!-- <button class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> Detail</button> -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h4>Balance</h4>
              <p><?php echo $formattedBalance; ?></p>
              <!-- <button class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> Detail</button> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Shalat Card -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
          <div class="card mb-4">
            <div class="card-header">
                <h5><?= date("d F Y"); ?></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <!-- Progress Bar -->
                <div class="col-md-6">
                  <div class="progress">
                    <div id="progressBar" class="progress-bar progress-bar-striped bg-success"
                        role="progressbar" style="width: <?= $progress ?>%"
                        aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>

                <!-- Checkbox untuk Shalat -->
                <div class="col-md-6">
                  <?php foreach ($shalatList as $key => $value): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input shalat-checkbox" type="checkbox"
                              id="<?= $key ?>" value="Ya"
                              data-shalat="<?= $key ?>"
                              <?= $value == "Ya" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="<?= $key ?>"><?= $key ?></label>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Dashboard Cards -->
      <div class="row mt-4">
        <!-- Todolist Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-primary text-white">
              Todolist
            </div>
            <div class="card-body">
              <ul>
                <li>Task 1</li>
                <li>Task 2</li>
                <li>Task 3</li>
              </ul>
              <a href="/todolist" class="btn btn-primary">Lihat Todolist</a>
            </div>
          </div>
        </div>

        <!-- Jurnal Harian Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-success text-white">
              Jurnal Harian
            </div>
            <div class="card-body">
              <p>Ringkasan Jurnal Hari Ini...</p>
              <a href="#" class="btn btn-success">Lihat Jurnal Harian</a>
            </div>
          </div>
        </div>

        <!-- Riwayat Shalat Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-info text-white">
              Riwayat Shalat
            </div>
            <div class="card-body">
              <p>Shalat yang telah dilakukan...</p>
              <a href="#" class="btn btn-info">Lihat Riwayat Shalat</a>
            </div>
          </div>
        </div>

        <!-- Riwayat Bacaan Quran Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-warning text-white">
              Riwayat Bacaan Quran
            </div>
            <div class="card-body">
              <p>Jumlah ayat yang sudah dibaca...</p>
              <a href="#" class="btn btn-warning">Lihat Riwayat Bacaan Quran</a>
            </div>
          </div>
        </div>

        <!-- Riwayat Financial Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-danger text-white">
              Riwayat Financial
            </div>
            <div class="card-body">
              <p>Transaksi yang dilakukan...</p>
              <a href="#" class="btn btn-danger">Lihat Riwayat Financial</a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php include 'footer.php'; ?>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="/js/jquery-3.6.0.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>