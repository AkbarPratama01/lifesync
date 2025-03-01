<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Goal</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Edit Goal</h5>
          </div>
          <div class="card-body">
            <form action="/goal/edit/submit" method="POST">
              <input type="hidden" name="id" value="<?= htmlspecialchars($goal->id); ?>">

              <div class="mb-3">
                <label for="text" class="form-label">Name Goal</label>
                <input type="text" class="form-control" id="text" name="text"
                  value="<?= htmlspecialchars($goal->text); ?>" required>
              </div>

              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" name="year" id="year" class="form-control" min="1900" max="2100"
                  value="<?= htmlspecialchars($goal->year); ?>" required>
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed"
                  <?= $goal->is_completed ? 'checked' : ''; ?>>
                <label class="form-check-label" for="is_completed">Mark as Completed</label>
              </div>

              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="/goal" class="btn btn-secondary">Cancel</a>
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