<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update User</title>
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm rounded-3">
        <div class="card-header bg-dark text-white text-center">
          <h4 class="mb-0">Update User</h4>
        </div>
        <div class="card-body">
       
          <form action="<?=site_url(url: '/students/update/'.$stu['id']);?>" method="POST">
            <div class="mb-3">
              <input type="text" id="lastname" name="lastname" class="form-control" value="<?=$stu['lastname'];?>">
            </div>
            <div class="mb-3">
              <input type="text" id="firstname" name="firstname" class="form-control" value="<?=$stu['firstname'];?>">
            </div>
            <div class="mb-3">
              <input type="text" id="email" name="email" class="form-control" value="<?=$stu['email'];?>">
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Update User</button>
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
