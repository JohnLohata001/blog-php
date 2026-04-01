<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> | Manage Users</title>
</head>
<body>
     <a href="<?php echo URL_ROOT; ?>">logout</a>
    <h1>Manage Users</h1>
    <a href="<?php echo URL_ROOT; ?>/users/create">Create New User</a>
    <br><br>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>
                    <a href="<?= URL_ROOT; ?>/users/edit/<?php echo 1 ?>">Edit</a> |
                    <a href="<?= URL_ROOT; ?>/users/delete/<?php echo 1 ?>">Delete</a>
                </td>
                </tr>
          
        </tbody>
    </table>
</body>
</html>