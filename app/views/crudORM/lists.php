<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Students List</h2>


       
        <a href="<?= site_url('students/create'); ?>" class="btn btn-primary">➕ Add Student</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students as $s): ?>
            <tr>
                <td><?= $s['id']; ?></td>
                <td><?= $s['firstname']; ?></td>
                <td><?= $s['lastname']; ?></td>
                <td><?= $s['email']; ?></td>
                <td>
            
                    <a href="<?= site_url('students/update/'.$s['id']); ?>" class="btn btn-warning btn-sm">✏️ Update</a>

                 
                    <a href="<?= site_url('students/delete/'.$s['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">🗑️ Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
