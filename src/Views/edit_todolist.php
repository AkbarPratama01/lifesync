<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit ToDo</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Edit ToDo</h5>
          </div>
          <div class="card-body">
            <form action="/todolist/edit/submit" method="POST">
              <input type="hidden" name="id" value="<?= htmlspecialchars($todo->id); ?>">

              <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" class="form-control" id="task" name="task"
                  value="<?= htmlspecialchars($todo->task); ?>" required>
              </div>

              <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date"
                  value="<?= htmlspecialchars($todo->due_date); ?>" required>
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed"
                  <?= $todo->is_completed ? 'checked' : ''; ?>>
                <label class="form-check-label" for="is_completed">Mark as Completed</label>
              </div>

              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="/todolist" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>