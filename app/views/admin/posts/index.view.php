<?php $this->view('admin/inc/header', []); ?>  
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>All Posts</h2>
                <a href="<?=URL_ROOT?>/admin/create_post" class="btn">
                    <i class="fas fa-plus"></i>
                    Add New Post
                </a>
            </div>
            
            <!-- Pagination Info -->
            <div class="pagination-info">
                Showing <?= (($data['current_page'] - 1) * $data['per_page']) + 1 ?> 
                to <?= min($data['current_page'] * $data['per_page'], $data['total_posts']) ?> 
                of <?= $data['total_posts'] ?> posts
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Images</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = (($data['current_page'] - 1) * $data['per_page']) + 1; ?>
                        <?php foreach ($data['posts'] as $post): ?>
                        <tr>
                            <td><?= $counter++; ?></td>
                            <td>
                                <div class="img_view">
                                    <?php
                                        $imageUrl = URL_ROOT . '/assets/images/uploads/' . $post['featured_image'];
                                        echo '<img src="' . $imageUrl . '" alt="Post image">';
                                    ?>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($post['title']) ?></td>
                            <td>Admin</td>
                            <td class="status-<?= strtolower($post['status']) ?>"><?= $post['status'] ?></td>
                            <td><?= date('F j, Y', strtotime($post['created_at'])); ?></td>
                            <td>
                                <div class="action-links">
                                    <a href="<?= URL_ROOT ?>/admin/edit_post/<?= $post['id'] ?>" class="action-edit">Edit</a>
                                    <a href="<?= URL_ROOT ?>/admin/delete_post/<?= $post['id'] ?>" class="action-delete" >Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php if (empty($data['posts'])): ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">No posts found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <?php if ($data['total_pages'] > 1): ?>
            <div class="pagination">
                <?php if ($data['current_page'] > 1): ?>
                    <a href="?page=1" class="pagination-link">First</a>
                    <a href="?page=<?= $data['current_page'] - 1 ?>" class="pagination-link">Previous</a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                    <?php if ($i == $data['current_page']): ?>
                        <span class="pagination-current"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?page=<?= $i ?>" class="pagination-link"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <?php if ($data['current_page'] < $data['total_pages']): ?>
                    <a href="?page=<?= $data['current_page'] + 1 ?>" class="pagination-link">Next</a>
                    <a href="?page=<?= $data['total_pages'] ?>" class="pagination-link">Last</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </section>
    </main>
<?php $this->view('admin/inc/footer', []); ?>