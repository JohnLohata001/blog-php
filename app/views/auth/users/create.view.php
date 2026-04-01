<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> | Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="<?php echo URL_ROOT; ?>/admin/users/store" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Create User</button>
        <a href="<?php echo URL_ROOT; ?>/users">Back to User List</a>
    </form>
</body>
</html>