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
                            <input type="text" id="title" name="title" class="input-info" 
                                   value="<?= htmlspecialchars($data['post']->title ?? $data['post']['title'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="5" class="input-info" required><?= htmlspecialchars($data['post']->content ?? $data['post']['content'] ?? '') ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" rows="2" class="input-info"><?= htmlspecialchars($data['post']->excerpt ?? $data['post']['excerpt'] ?? '') ?></textarea>
                        </div>

                        <!-- Current Image Preview -->
                        <?php 
                        $currentImage = $data['post']->featured_image ?? $data['post']['featured_image'] ?? '';
                        if (!empty($currentImage)): 
                        ?>
                        <div class="form-group">
                            <label>Current Featured Image</label>
                            <div style="margin-bottom: 10px;">
                                <img src="<?= URL_ROOT ?>/assets/images/uploads/<?= $currentImage ?>" 
                                     alt="Current featured image" 
                                     style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                <div class="form-text" style="margin-top: 5px;">
                                    Current image: <?= $currentImage ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="featured_image">
                                <?= !empty($currentImage) ? 'Change Featured Image' : 'Featured Image' ?>
                            </label>
                            <input type="file" id="featured_image" name="featured_image" accept="image/*" class="input-info">
                            <?php if (!empty($currentImage)): ?>
                            <div class="form-text">Leave empty to keep current image</div>
                            <?php endif; ?>
                        </div>
                    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="input-info">
                                <?php 
                                $currentStatus = $data['post']->status ?? $data['post']['status'] ?? '';
                                $statusOptions = ['draft' => 'Draft', 'published' => 'Published'];
                                foreach ($statusOptions as $value => $label): 
                                ?>
                                    <option value="<?= $value ?>" 
                                        <?= ($value == $currentStatus) ? 'selected' : '' ?>>
                                        <?= $label ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="post_type">Post Type</label>
                            <select name="post_type" id="post_type" class="input-info">
                                <?php 
                                $currentPostType = $data['post']->post_type ?? $data['post']['post_type'] ?? '';
                                $postTypeOptions = [
                                    'article' => 'Article', 
                                    'tutorial' => 'Tutorial', 
                                    'project' => 'Project'
                                ];
                                foreach ($postTypeOptions as $value => $label): 
                                ?>
                                    <option value="<?= $value ?>" 
                                        <?= ($value == $currentPostType) ? 'selected' : '' ?>>
                                        <?= $label ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="input-info" required>
                                <option value="">Select Category</option>
                                <?php 
                                $currentCategoryId = $data['post']->category_id ?? $data['post']['category_id'] ?? '';
                                foreach ($data['categories'] as $category): 
                                    $categoryId = $category->id ?? $category['id'];
                                    $categoryName = $category->name ?? $category['name'];
                                ?>
                                    <option value="<?= $categoryId ?>" 
                                        <?= ($categoryId == $currentCategoryId) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($categoryName) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <hr class="form-divider">
                        <div class="form-group">
                            <label for="submit"></label>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-create">
                                    <i class="fas fa-save"></i> Update Post
                                </button>
                                <button type="reset" class="btn btn-reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php $this->view('admin/inc/footer', []); ?>