<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm rounded-3">
        <div class="card-header bg-dark text-white text-center">
          <h4 class="mb-0">Add New Student</h4>
        </div>
        <div class="card-body">

          <?php if (isset($insert_id)): ?>
            <?php if ($insert_id): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                🎉 Inserted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php else: ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ❌ Insert failed! Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <form action="<?= site_url('students/create'); ?>" method="POST">
            <div class="mb-3">
              <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter your lastname" required>
            </div>
            <div class="mb-3">
              <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your firstname" required>
            </div>
            <div class="mb-3">
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
            <div class="d-grid">
              <a class="btn btn-primary mt-2" role="button" href="<?=site_url('students/get-all');?>">STUDENT LIST</a>
            </div>    
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
