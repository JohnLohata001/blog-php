<?php $this->view('admin/inc/header', []); ?>
 
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <div class="header-info">
                    <h1>Create New Post</h1>
                    <p>Add a new article, tutorial, or project to your blog</p>
                    
                </div>
                <a href="<?=URL_ROOT?>/admin/posts" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            
            <div class="table-container">
                <div class="form-content">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Fields marked with <span style="color: var(--danger)">*</span> are required.
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title" class="required">Title</label>
                            <input type="text" id="title" name="title" class="input-info" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="required">Content</label>
                            <textarea id="content" name="content" rows="5" class="input-info" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="required">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" rows="2" class="input-info"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_image">Select Image</label>
                            <input type="file" id="featured_image" name="featured_image" accept="image/*" class="input-info">
                        </div>
                    
                        <div class="form-group">
                            <label for="status" class="required">Status</label>
                            <select id="status" name="status" class="input-info">
                                <option value="" disabled selected>Select Status</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_type" class="required">Post Type</label>
                            <select name="post_type" id="post_type" class="input-info">
                                <option value="" disabled selected>Select Post Type</option>
                                <option value="article">Article</option>
                                <option value="tutorial">Tutorial</option>
                                <option value="project">Project</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="required">Category</label>
                            <select id="category_id" name="category_id" class="input-info">
                                <option value="" disabled selected>Select Category</option>
                                <?php foreach ($data['categories'] as $categ): ?> 
                                    <option value="<?=htmlspecialchars($categ['id'])?>">
                                        <?=htmlspecialchars($categ['name'])?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <hr class="form-divider">
                        <div class="form-group">
                            <label for="submit"></label>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-create"> <i class="fas fa-plus"></i> Create Post</button>
                                <button type="reset" class="btn btn-reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php $this->view('admin/inc/footer', []); ?>
