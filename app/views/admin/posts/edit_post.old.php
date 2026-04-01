<?php $this->view('admin/inc/header', []); ?>
        
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>Update Post</h2>
                <a href="<?=URL_ROOT?>/admin/posts" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            
            <div class="table-container">
                <div class="form-content">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="input-info" value="<?=htmlspecialchars($data['post']['title'])?>" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="5" class="input-info" required><?=htmlspecialchars($data['post']['content'])?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" rows="2" class="input-info"><?=htmlspecialchars($data['post']['excerpt'])?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_image">Select Image</label>
                            <input type="file" id="featured_image" name="featured_image" accept="image/*" class="input-info">
                        </div>
                    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="input-info">
                                <option value="<?=htmlspecialchars($data['post']['status'])?>"><?=htmlspecialchars($data['post']['status'])?></option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_type">Post Type</label>
                            <select name="post_type" id="post_type" class="input-info">
                                <option value="article">Article</option>
                                <option value="tutorial">Tutorial</option>
                                <option value="project">Project</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="input-info" required>
                                <option value="">Select Category</option>
                                <?php foreach ($data['categories'] as $category): ?>
                                    <option value="<?= $category['id'] ?>" 
                                        <?= ($category['id'] == $data['post']['category_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['name']) ?>
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
