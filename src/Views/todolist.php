<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo List</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <div id="content" class="content">
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
      <h1 class="mb-4">ToDo List</h1>

      <!-- Add Task Button -->
      <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add New Task</button>

      <!-- ToDo List Table -->
      <table id="todoTable" class="table table-striped">
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
          <?php foreach ($todos as $index => $todo): ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($todo->task); ?></td>
            <td><?= htmlspecialchars($todo->due_date); ?></td>
            <td>
              <?= $todo->is_completed ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-warning">Pending</span>'; ?>
            </td>
            <td>
              <button class="btn btn-sm btn-success" onclick="completeTask(<?= $todo->id; ?>)">Complete</button>
              <button class="btn btn-sm btn-warning" onclick="editTask(<?= $todo->id; ?>)">Edit</button>
              <button class="btn btn-sm btn-danger" onclick="deleteTask(<?= $todo->id; ?>)">Delete</button>
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
          <form method="POST" action="/todolist/add">
            <div class="modal-header">
              <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" name="task" id="task" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Task</button>
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
      text: "Mark this task as completed?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `/todolist/complete/${id}`;
      }
    });
  }

  function editTask(id) {
    window.location.href = `/todolist/edit/${id}`;
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
        window.location.href = `/todolist/delete/${id}`;
      }
    });
  }
  </script>
</body>

</html>