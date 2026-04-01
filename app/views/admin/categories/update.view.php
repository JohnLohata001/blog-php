<?php $this->view('admin/inc/header', []); ?>  
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>Categories Of Posts</h2>
                <a href="<?=URL_ROOT?>/categories/create" class="btn">
                    <i class="fas fa-plus"></i>
                    Add New User
                </a>
            </div>
            <div class="table-container">
                
                <h2>Update  Categories</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['category']) ?>" class="input-cat">
                    </div>
                    <button type="submit" class="btn">Update Category</button>
                </form>
            </div>
            
        </section>
    </main>
<?php $this->view('admin/inc/footer', []); ?>