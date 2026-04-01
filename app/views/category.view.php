<?php require 'inc/header.php';?>
<main>
    <section class="posts_category">
        <div class="line_title">
            <h1>Posts with category: <?=htmlspecialchars($data['category_name'] ?? 'Unknown Category')?></h1>
        </div>

        <?php if(empty($data['posts'])): ?>
            <div class="no-posts">
                <p>No posts found in this category.</p>
            </div>
        <?php else: ?>
            <?php foreach($data['posts'] as $post): ?>
            <article class="post-card-full">
                 <?php
                        $imageUrl = URL_ROOT . '/assets/images/uploads/' . $post['featured_image'];
                        echo '<img src="' . $imageUrl . '" alt="Post image"  class="post-image">';
                    ?>                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category"><?=htmlspecialchars($post['excerpt'])?></a>
                        <span class="post-date"><?=htmlspecialchars(date('F j, Y', strtotime($post['created_at'])))?></span>
                    </div>
                    <h2 class="post-title"><a href="#"><?=htmlspecialchars($post['title'])?></a></h2>
                    <p class="post-excerpt"><?=htmlspecialchars($post['excerpt'])?></p>
                    <a href="<?=URL_ROOT?>/posts/details/<?=htmlspecialchars($post['id'])?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- Pagination Section for Category -->
        <?php if(isset($data['total_pages']) && $data['total_pages'] > 1): ?>
        <div class="pagination-container">
            <nav class="pagination" aria-label="Category post navigation">
                <!-- Previous Page -->
                <?php if($data['current_page'] > 1): ?>
                    <a href="?page=<?=$data['current_page'] - 1?>" class="pagination-link pagination-prev">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                <?php else: ?>
                    <span class="pagination-link pagination-prev disabled">
                        <i class="fas fa-chevron-left"></i> Previous
                    </span>
                <?php endif; ?>

                <!-- Page Numbers -->
                <div class="pagination-numbers">
                    <?php 
                    $current_page = $data['current_page'];
                    $total_pages = $data['total_pages'];
                    $start_page = max(1, $current_page - 2);
                    $end_page = min($total_pages, $current_page + 2);
                    
                    // Show first page if not in range
                    if($start_page > 1) {
                        echo '<a href="?page=1" class="pagination-link">1</a>';
                        if($start_page > 2) echo '<span class="pagination-ellipsis">...</span>';
                    }
                    
                    // Show page numbers
                    for($i = $start_page; $i <= $end_page; $i++): 
                        if($i == $current_page): ?>
                            <span class="pagination-link pagination-current"><?=$i?></span>
                        <?php else: ?>
                            <a href="?page=<?=$i?>" class="pagination-link"><?=$i?></a>
                        <?php endif;
                    endfor;
                    
                    // Show last page if not in range
                    if($end_page < $total_pages) {
                        if($end_page < $total_pages - 1) echo '<span class="pagination-ellipsis">...</span>';
                        echo '<a href="?page='.$total_pages.'" class="pagination-link">'.$total_pages.'</a>';
                    }
                    ?>
                </div>

                <!-- Next Page -->
                <?php if($data['current_page'] < $data['total_pages']): ?>
                    <a href="?page=<?=$data['current_page'] + 1?>" class="pagination-link pagination-next">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                <?php else: ?>
                    <span class="pagination-link pagination-next disabled">
                        Next <i class="fas fa-chevron-right"></i>
                    </span>
                <?php endif; ?>
            </nav>
            
            <!-- Page Info -->
            <div class="pagination-info">
                Showing <?=($data['current_page'] - 1) * $data['posts_per_page'] + 1?> - 
                <?=min($data['current_page'] * $data['posts_per_page'], $data['total_posts'])?> 
                of <?=$data['total_posts']?> posts in <?=htmlspecialchars($data['category_name'] ?? 'this category')?>
            </div>
        </div>
        <?php endif; ?>
    </section>
</main>

<?php require_once 'inc/footer.php'; ?>