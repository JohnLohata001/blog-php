<?php require 'inc/header.php';?>
<!-- app/views/posts.view.php -->
<main>
    <section class="posts">
        <div class="line_title">
            <h1>All Posts</h1>
        </div>
        <?php if(empty($data['posts'])): ?>
            <div class="no-posts">
                <p>No posts found.</p>
            </div>
        <?php else: ?>
            <?php foreach($data['posts'] as $post): ?>
            <article class="post-card">
                 <?php
                        $imageUrl = URL_ROOT . '/assets/images/uploads/' . $post['featured_image'];
                        echo '<img src="' . $imageUrl . '" alt="Post image"  class="post-image">';
                    ?>
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date"><?=htmlspecialchars(date('F j, Y', strtotime($post['created_at'])))?></span>
                    </div>
                    <h2 class="post-title"><a href="#"><?=htmlspecialchars($post['title'])?></a></h2>
                    <p class="post-excerpt">Explore the powerful features of ECMAScript 6 and learn how to write cleaner, more efficient JavaScript code with arrow functions, destructuring, template literals, and more.</p>
                    <a href="<?=URL_ROOT?>/posts/details/<?=htmlspecialchars($post['id'])?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
       <!-- Pagination Section - Pure PHP -->
        <?php if(isset($data['total_pages']) && $data['total_pages'] > 1): ?>
        <div class="pagination-container">
            <nav class="pagination" aria-label="Post navigation">
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
                Page <?=$data['current_page']?> of <?=$data['total_pages']?> 
                (<?=$data['total_posts']?> total posts)
            </div>
        </div>
        <?php endif; ?>  
    </section>

    <aside class="sidebar">
        <!-- Your existing sidebar content remains the same -->
        <div class="sidebar-widget">
            <h3 class="widget-title">About Me</h3>
            <p>Full-stack developer with a passion for clean code and efficient solutions. Sharing knowledge through tutorials and articles.</p>
        </div>

        <div class="sidebar-widget">
            <h3 class="widget-title">Categories</h3>
            <ul class="categories-list">
                <?php foreach($data['categories'] as $category): ?>
                <li><a href="<?=URL_ROOT?>/posts/category/<?=htmlspecialchars($category['id'])?>"><?=htmlspecialchars($category['name'])?> <span><?=htmlspecialchars($category['post_count'])?></span></a></li>
                <?php endforeach; ?>                    
            </ul>
        </div>

        <!-- ... rest of your sidebar ... -->
        <div class="sidebar-widget">
            <h3 class="widget-title">Popular Posts</h3>
            <div class="popular-posts">
                <a href="#" class="popular-post">
                    <img src="https://source.unsplash.com/random/100x100/?javascript" alt="Popular Post">
                    <div class="popular-post-content">
                        <h4>Understanding JavaScript Closures</h4>
                        <small>March 5, 2023</small>
                    </div>
                </a>
                <a href="#" class="popular-post">
                    <img src="https://source.unsplash.com/random/100x100/?react" alt="Popular Post">
                    <div class="popular-post-content">
                        <h4>React Context API Guide</h4>
                        <small>February 18, 2023</small>
                    </div>
                </a>
                <a href="#" class="popular-post">
                    <img src="https://source.unsplash.com/random/100x100/?css" alt="Popular Post">
                    <div class="popular-post-content">
                        <h4>CSS Custom Properties</h4>
                        <small>January 30, 2023</small>
                    </div>
                </a>
            </div>
        </div>

        <div class="sidebar-widget">
            <h3 class="widget-title">Newsletter</h3>
            <p>Subscribe to get the latest posts and tutorials directly to your inbox.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </aside>

</main>

<?php require_once 'inc/footer.php'; ?>