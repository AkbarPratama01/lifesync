<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Harian</title>
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
      <h1 class="text-center">Jurnal Harian</h1>
      <hr>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Entri Jurnal Baru</div>
        <div class="card-body">
          <form action="/jurnal-harian/store" method="POST">
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Judul</label>
              <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Konten</label>
              <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-secondary text-white">Daftar Entri Jurnal</div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="jurnalTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <th>Konten</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($journals as $index => $journal): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($journal->date) ?></td>
                  <td><?= htmlspecialchars($journal->title) ?></td>
                  <td><?= htmlspecialchars($journal->content) ?></td>
                  <td>
                    <a href="/jurnal-harian/edit/<?= $journal->id ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $journal->id ?>)">Hapus</a>
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
    $('#jurnalTable').DataTable(); // Initialize DataTables
  });

  function confirmDelete(journalId) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Entri jurnal ini akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/jurnal-harian/delete/${journalId}`;
      }
    });
  }
  </script>
</body>

</html>