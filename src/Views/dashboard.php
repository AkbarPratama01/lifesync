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
      <p>Email Anda: <?= htmlspecialchars($userEmail); ?></p>

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
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>