<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Goal List</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
      <h1 class="mb-4">Goal List</h1>

      <!-- Add Task Button -->
      <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add New Goal</button>

      <!-- ToDo List Table -->
      <table id="todoTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($goals as $index => $goal): ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($goal->text); ?></td>
            <td><?= htmlspecialchars($goal->year); ?></td>
            <td>
              <?= $goal->is_completed ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-warning">Pending</span>'; ?>
            </td>
            <td>
              <button class="btn btn-sm btn-success" onclick="completeTask(<?= $goal->id; ?>)">Complete</button>
              <button class="btn btn-sm btn-warning" onclick="editTask(<?= $goal->id; ?>)">Edit</button>
              <button class="btn btn-sm btn-danger" onclick="deleteTask(<?= $goal->id; ?>)">Delete</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Add Task Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="/goal/add">
            <div class="modal-header">
              <h5 class="modal-title" id="addTaskModalLabel">Add New Goal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="text" class="form-label">Name Goal</label>
                <input type="text" name="text" id="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" name="year" id="year" class="form-control" min="1900" max="2100" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Goal</button>
            </div>
          </form>
        </div>
      </div>
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
    $('#todoTable').DataTable();
  });

  function completeTask(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Mark this goal as completed?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/goal/complete/${id}`;
      }
    });
  }

  function editTask(id) {
    window.location.href = `/goal/edit/${id}`;
  }

  function deleteTask(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/goal/delete/${id}`;
      }
    });
  }
  </script>
</body>

</html>