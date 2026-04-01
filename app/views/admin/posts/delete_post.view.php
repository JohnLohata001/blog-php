<?php $this->view('admin/inc/header', []); ?>  
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>All Posts</h2>
                <a href="<?=URL_ROOT?>/admin/posts/index" class="btn">
                    <i class="fas fa-plus"></i>
                    Go To Post
                </a>
            </div>
             <?php if(!empty($data['message'])): ?>
                <div class="alert alert-<?= strpos($data['message'], 'successfully') !== false ? 'success' : 'danger' ?>">
                    <i class="fas fa-<?= strpos($data['message'], 'successfully') !== false ? 'check' : 'exclamation' ?>-circle"></i>
                    <?= $data['message'] ?>
                </div>
            <?php endif; ?>
            
            <div class="table-container">
                <div class="form-content">
                    
                    <div class="alert alert-danger">
                        <i class="fas fa-info-circle"></i> Are you sure to delete <span style="color: var(--danger)">*</span> this record ? No Backup
                    </div>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value ="<?=$data['id']?>" class="input-info" >
                        </div>                        
                        <div class="form-group">
                            <label for="content" class="required">Content Preview</label>
                            <textarea id="content" name="content" rows="5" class="input-info" disabled>
                                This will delete post with ID: <?= $data['id'] ?>
                            </textarea>
                        </div>
                        <hr class="form-divider">
                        <div class="form-group">
                            <label for="submit"></label>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete Post</button>
                                <button type="reset" class="btn btn-reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                

                </div>   
            </div>
            
        </section>
    </main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.querySelector('.alert-success');
        const deleteWarning = document.getElementById('deleteWarning');
        const deleteForm = document.getElementById('deleteForm');
        
        // If there's a success message, hide the form and warning
        if (successMessage) {
            if (deleteWarning) deleteWarning.style.display = 'none';
            if (deleteForm) deleteForm.style.display = 'none';
            
            // Optional: Show a "go back" link
            const goBackLink = document.createElement('div');
            goBackLink.className = 'text-center';
            goBackLink.innerHTML = `
                <a href="<?=URL_ROOT?>/admin/posts/index" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Return to Posts List
                </a>
            `;
            deleteForm.parentNode.appendChild(goBackLink);
        }
    });
</script>
<?php $this->view('admin/inc/footer', []); ?>