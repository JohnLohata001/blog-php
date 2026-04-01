<?php require 'inc/header.php';?>
<main>
    <section class="posts_category">
        <div class="line_title">
            <h1> Posts Details </h1>
        </div>

        <?php if(empty($data['post'])): ?>
            <div class="no-posts">
                <p>No posts found in this category.</p>
            </div>
        <?php else: ?>
            
            <article class="post-card-full">
                    <?php
                        $imageUrl = URL_ROOT . '/assets/images/uploads/' . $post['featured_image'];
                        echo '<img src="' . $imageUrl . '" alt="Post image"  class="post-view">';
                    ?>
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category"><?=htmlspecialchars($post['excerpt'])?></a>
                        <span class="post-date"><?=htmlspecialchars(date('F j, Y', strtotime($post['created_at'])))?></span>
                    </div>
                    <h2 class="post-title"><a href="#"><?=htmlspecialchars($post['title'])?></a></h2>
                    <p class="post-excerpt"><?=htmlspecialchars($post['content'])?></p>
                    <a href="<?=URL_ROOT?>/posts/<?=htmlspecialchars($post['id'])?>" class="read-more"> <i class="fas fa-arrow-left"></i>Go Back</a>
                </div>
            </article>
           
        <?php endif; ?>
        
       
    </section>
</main>

<?php require_once 'inc/footer.php'; ?>