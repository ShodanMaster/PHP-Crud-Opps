<?php 

require_once("controllers/NameController.php");
$userController = new NameController();
$users = $userController->listUsers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - OOP</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="js/sweetalert/sweetalert.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>CRUD - OOP</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                Add User
            </button>
        </div>

        <!-- Users Table -->
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $num = 1; foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($num++); ?></td>
                            <td><?= htmlspecialchars($user['name']); ?></td>
                            <td>
                                <button class="updateName btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?= htmlspecialchars($user['id']); ?>" data-name="<?= htmlspecialchars($user['name']); ?>">Edit</button>
                                <button class="btn btn-danger btn-sm" data-id="<?= htmlspecialchars($user['id']); ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Add Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="nameForm" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Update Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="udpateForm" method="POST">
                    <input type="hidden" name="id" id="editId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/actions/name.js"></script>
</body>
</html>
