<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quran List</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
      <h1 class="mb-4">Quran List</h1>

      <!-- ToDo List Table -->
      <table id="quranTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Asma</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($surat as $index => $s): ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($s->nomor); ?></td>
            <td><?= htmlspecialchars($s->nama); ?></td>
            <td><?= htmlspecialchars($s->asma); ?></td>
            <td>
              <a href="/quran/<?= $s->id; ?>" class="btn btn-sm btn-info">View Ayats</a>
              <button class="btn <?= in_array($s->id, $bookmarkedSurats) ? 'btn-success' : 'btn-primary'; ?>"
                onclick="bookmarkSurat(<?= $s->id; ?>)">
                <?= in_array($s->id, $bookmarkedSurats) ? 'Bookmarked' : 'Bookmark'; ?>
              </button>
            </td>
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
    $('#quranTable').DataTable();
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