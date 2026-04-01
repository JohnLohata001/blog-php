    <?php $this->view('admin/inc/header', []); ?>  
        
        <main class="main-content">
            <section class="content-section ">
                <div class="dashboard-header">
                    <h2>Welcome to the Admin Dashboard</h2>
                </div>
                <hr class="form-divider">
               <div class="container-dashboard">
                   <div class="dashboard-card">
                       <h3>Total Posts</h3>
                    <hr class="form-divider">
                       <p class="card-number"><?=$data['count_posts']?></p>
                       <a href="<?=URL_ROOT?>/admin/posts" class="card-link">View Posts</a>
                   </div>
                <div class="dashboard-card">
                    <h3>Total Categories</h3>
                    <hr class="form-divider">
                    <p class="card-number"><?=$data['categories']?></p>
                    <a href="<?=URL_ROOT?>/admin/categories" class="card-link">View Categories</a>
                </div>
                <div class="dashboard-card">
                    <h3>Total Users</h3>
                    <hr class="form-divider">
                    <p class="card-number">5</p>
                    <a href="<?=URL_ROOT?>/admin/users" class="card-link">View Users</a>
                </div>
                <div class="dashboard-card">
                    <h3>Pending Comments</h3>
                    <hr class="form-divider">
                    <p class="card-number">12</p>
                    <a href="#" class="card-link">View Comments</a>
                </div>
               </div>
            </section>
            <!-- Add more content sections here -->
        </main>
     <?php $this->view('admin/inc/footer', []); ?>