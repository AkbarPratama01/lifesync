<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Details</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
      <h1 class="mb-4"><?= htmlspecialchars($surat->nama); ?> (<?= htmlspecialchars($surat->asma); ?>)</h1>
      <p><strong>Nomor:</strong> <?= htmlspecialchars($surat->nomor); ?></p>
      <p><strong>Arti:</strong> <?= htmlspecialchars($surat->arti); ?></p>
      <p><strong>Rukuk:</strong> <?= htmlspecialchars($surat->rukuk); ?></p>
      <p><strong>Tipe:</strong> <?= htmlspecialchars($surat->type); ?></p>
      <p><strong>Keterangan:</strong> <?= $surat->keterangan; ?></p>

      <!-- Bookmark Button -->
      <button class="btn <?= $isBookmarked ? 'btn-success' : 'btn-primary'; ?> mb-4"
        onclick="bookmarkSurat(<?= $surat->id; ?>)">
        <?= $isBookmarked ? 'Already Bookmarked' : 'Bookmark This Surat'; ?>
      </button>
      <!-- Kembali Button -->
      <a class="btn btn-warning mb-4" href="javascript:history.back()">Kembali</a>

      <!-- Ayat List Table -->
      <h3>Ayat-ayat of <?= htmlspecialchars($surat->nama); ?></h3>
      <table id="ayatTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Ayat</th>
            <th>Text</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ayat as $index => $a): ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($a->nomor); ?></td>
            <td><?= htmlspecialchars($a->ar); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php include 'footer.php'; ?>
  </div>

  <script src="/js/jquery-3.6.0.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap5.min.js"></script>
  <script src="/js/script.js"></script>
  <script>
  $(document).ready(function() {
    $('#ayatTable').DataTable();
  });

  function bookmarkSurat(surat_id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Add this Surat to your bookmarks?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes, bookmark it!',
      cancelButtonText: 'No, cancel!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/quran/bookmark/${surat_id}`;
      }
    });
  }
  </script>
</body>

</html>