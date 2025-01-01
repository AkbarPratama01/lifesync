<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Shalat</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/sweetalert2.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

  <!-- Include DataTables CSS -->
  <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
      <h1 class="text-center">Riwayat Shalat</h1>
      <hr>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Riwayat Shalat Baru</div>
        <div class="card-body">
          <form action="/riwayat-shalat/store" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Fajr</label><br>
              <select name="fajr" class="form-select" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Dhuhr</label><br>
              <select name="dhuhr" class="form-select" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Asr</label><br>
              <select name="asr" class="form-select" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Maghrib</label><br>
              <select name="maghrib" class="form-select" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Isha</label><br>
              <select name="isha" class="form-select" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-secondary text-white">Daftar Riwayat Shalat</div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="shalatTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Fajr</th>
                  <th>Dhuhr</th>
                  <th>Asr</th>
                  <th>Maghrib</th>
                  <th>Isha</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($shalatHistory as $index => $shalat): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($shalat->date) ?></td>
                  <td><?= htmlspecialchars($shalat->fajr) ?></td>
                  <td><?= htmlspecialchars($shalat->dhuhr) ?></td>
                  <td><?= htmlspecialchars($shalat->asr) ?></td>
                  <td><?= htmlspecialchars($shalat->maghrib) ?></td>
                  <td><?= htmlspecialchars($shalat->isha) ?></td>
                  <td>
                    <a href="/riwayat-shalat/edit/<?= $shalat->id ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $shalat->id ?>)">Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include DataTables JS -->
  <script src="/js/jquery-3.6.0.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap5.min.js"></script>
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/script.js"></script>
  <script>
  $(document).ready(function() {
    $('#shalatTable').DataTable(); // Initialize DataTables
  });

  function confirmDelete(shalatId) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Riwayat shalat ini akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/riwayat-shalat/delete/${shalatId}`;
      }
    });
  }
  </script>
</body>

</html>