<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DevBlog Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?=URL_ROOT?>/assets/css/dashStyles.css">
</head>

<body>
    <div class="dashboard-container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <nav class="admin-nav">
                <ul>
                    <li>
                        <a href="#">
                            <span>Options</span>
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul class="dropdown">
                            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
                <aside class="admin-sidebar">
            <div class="sidebar-section">
                <h2>Navigation</h2>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="<?=URL_ROOT?>/admin/dashboard" class="menu-link">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?=URL_ROOT?>/admin/posts" class="menu-link">
                            <i class="fas fa-file-alt"></i>
                            <span>Posts</span>
                            <span class="menu-badge">24</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?=URL_ROOT?>/category" class="menu-link">
                            <i class="fas fa-folder"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?=URL_ROOT?>/users/" class="menu-link">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?=URL_ROOT?>/settings" class="menu-link">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-footer">
                <p>&copy; 2024 DevBlog. All rights reserved.</p>
            </div>
        </aside>
        
        
