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
                <div class="col-md-6">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Shubuh" value="Ya">
                    <label class="form-check-label" for="Shubuh">Shubuh</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Dzuhur" value="Ya">
                    <label class="form-check-label" for="Dzuhur">Dzuhur</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Ashar" value="Ya">
                    <label class="form-check-label" for="Ashar">Ashar</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Maghrib" value="Ya">
                    <label class="form-check-label" for="Maghrib">Maghrib</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Isya" value="Ya">
                    <label class="form-check-label" for="Isya">Isya</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Dashboard Cards -->
      <div class="row">
        <!-- Todolist Card -->
        <div class="col-lg-6 col-md-6">
          <div class="card">
            <div class="card-header bg-primary text-white">
              Todolist
            </div>
            <div class="card-body">
              <?php
                
                  if ($todos_length == 0) {
                    echo '<p>Todolist masih kosong</p>';
                  } else {
                    echo '<ul>';
                    foreach ($todos as $key => $value) {
                      echo '<li>'.$value['task'].' ('.date("d F Y", strtotime($value['due_date'])).')</li>';
                    }
                    echo '</ul>';
                  }
                ?>
              <a href="/todolist" class="btn btn-primary">Lihat Todolist</a>
            </div>
          </div>
        </div>

        <!-- Jurnal Harian Card -->
        <div class="col-lg-6 col-md-6">
          <div class="card">
            <div class="card-header bg-success text-white">
              Jurnal Harian
            </div>
            <div class="card-body">
              <?php
                if ($journals_length == 0) {
                  echo '<p>Jurnal belum dibuat</p>';
                } else {
                  echo '<h5>'.$journals[0]['title'].'</h5>';
                  echo '<b> Aktivitas Harian</b> : <p>'.$journals[0]['content'].'.</p>';
                  echo '<b>Perasaan dan Emosi</b> : <p>'.$journals[0]['emotions'].'.</p>';
                  echo '<b>Pencapaian</b> : <p>'.$journals[0]['achievements'].'.</p>';
                  echo '<b>Kegagalan</b> : <p>'.$journals[0]['failures'].'.</p>';
                  echo '<b>Renungan</b> : <p>'.$journals[0]['reflection'].'.</p>';
                  echo '<b>Rencana untuk Esok</b> : <p>'.$journals[0]['plans'].'.</p>';

                }
                
              ?>

              <a href="/jurnal-harian" class="btn btn-success">Lihat Jurnal Harian</a>
            </div>
          </div>
        </div>

        <!-- Riwayat Bacaan Quran Card -->
        <!-- <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header bg-warning text-white">
              Riwayat Bacaan Quran
            </div>
            <div class="card-body">
              <p>Jumlah ayat yang sudah dibaca...</p>
              <a href="/quran" class="btn btn-warning">Lihat Riwayat Bacaan Quran</a>
            </div>
          </div>
        </div> -->
      </div>

    </div>

    <?php include 'footer.php'; ?>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/script.js"></script>
</body>

</html>