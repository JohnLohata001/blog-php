<?php require_once 'inc/header.php' ?>
    
    <main>
        <div class="container" >
            <div class="error-container">
                <h1 class="error-code">404</h1>
                <h2 class="error-title">Oops! Page Not Found</h2>
                <p class="error-message">The page you're looking for doesn't exist or has been moved. Don't worry though, you can find plenty of other great content on our blog.</p>

                

                <a href="<?= URL_ROOT; ?>" class="home-button">
                    <i class="fas fa-arrow-left"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </main>


<?php require_once 'inc/footer.php'; ?>