<?php require 'inc/header.php';?>
<!-- app/view/search.view.php -->
    <main>
        <section>
            <div class="result-title">
                <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>
            </div>
            <div class="result-content">
                <?php if (empty($posts)): ?>
                    <p>No results found.</p>
                <?php else: ?>
                    
                    <?php foreach ($posts as $post): ?>
                        <div class="searchContent">
                            <h4><?= htmlspecialchars($post['title']) ?></h4>
                            <p>
                                <?= htmlspecialchars($post['content']) ?>
                            </p>
                            <a href="<?=URL_ROOT?>/posts/details/<?=htmlspecialchars($post['id'])?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>

                        </div>
                        
                    <?php endforeach; ?>
                   
                <?php endif; ?>
            </div>
           
            


        </section>
    </main>
<?php require_once 'inc/footer.php'; ?>

