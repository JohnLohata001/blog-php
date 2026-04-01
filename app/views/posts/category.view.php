<?php $this->view('inc/header'); ?>
<!-- app/views/posts/category.view.php -->
<main>
    <section class="posts_category">
        <h1>Posts with category <?= htmlspecialchars($data['category_name']) ?></h1>
        
        <?php if(empty($data['posts'])): ?>
            <p>No posts found in this category.</p>
        <?php else: ?>
            <?php foreach($data['posts'] as $post): ?>
            <article class="post-card-full">
                <img src="<?= URL_ROOT ?>/assets/images/cover_es6.png" alt="Post Image" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category"><?= htmlspecialchars($post['excerpt']) ?></a>
                        <span class="post-date"><?= htmlspecialchars(date('F j, Y', strtotime($post['created_at']))) ?></span>
                    </div>
                    <h2 class="post-title"><a href="#"><?= htmlspecialchars($post['title']) ?></a></h2>
                    <p class="post-excerpt"><?= htmlspecialchars($post['excerpt']) ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>
<?php $this->view('inc/footer'); ?>