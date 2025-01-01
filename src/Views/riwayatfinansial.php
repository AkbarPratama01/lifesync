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
      <h1 class="text-center">Riwayat Finansial</h1>
      <hr>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Riwayat Finansial Baru</div>
        <div class="card-body">
          <form action="/financial_records/store" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Keterangan</label><br>
              <input type="text" name="description" id="description" class="form-control"
                placeholder="Masukkan Keterangan" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Kategori</label><br>
              <input type="text" name="category" id="category" class="form-control" placeholder="Masukkan Kategori"
                required>
            </div>

            <div class="mb-3">
              <label class="form-label">Tipe</label><br>
              <select name="type" id="type" class="form-select" required>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Pengeluaran">Pengeluaran</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Nominal</label><br>
              <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan Nominal"
                required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-secondary text-white">Daftar Riwayat Finansial</div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="shalatTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Kategori</th>
                  <th>Tipe</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($financialHistory as $index => $financial): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($financial->date) ?></td>
                  <td><?= htmlspecialchars($financial->description) ?></td>
                  <td><?= htmlspecialchars($financial->category) ?></td>
                  <td><?= htmlspecialchars($financial->type) ?></td>
                  <td><?= htmlspecialchars($financial->nominal) ?></td>
                  <td>
                    <a href="/financial_records/edit/<?= $financial->id ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $financial->id ?>)">Hapus</a>
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

  function confirmDelete(financeId) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Riwayat finansial ini akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/financial_records/delete/${financeId}`;
      }
    });
  }
  </script>
</body>

</html>