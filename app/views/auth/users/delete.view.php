<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> | Delete User</title>
</head>
<body>
    <h1>Delete User</h1>
    <p>Are you sure you want to delete this user?</p>
    <form action="" method="POST">
        <button type="submit">Yes, Delete</button>
        <a href="<?php echo URL_ROOT; ?>/users">Cancel</a>
    </form>
</body>
</html>