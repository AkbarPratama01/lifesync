<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Tambahkan Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Tambahkan file CSS tambahan jika diperlukan -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h4>Register</h4>
          </div>
          <div class="card-body">
            <!-- Form registrasi -->
            <form action="/register/submit" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name"
                  required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                  required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                  placeholder="Enter your password" required>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                  placeholder="Confirm your password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            <small>Already have an account? <a href="/login">Login here</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambahkan Bootstrap JS -->
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>