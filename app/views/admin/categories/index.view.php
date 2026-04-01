<?php $this->view('admin/inc/header', []); ?> 
<style>
    .table-pagination {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.pagination {
    display: flex;
    list-style: none;
    gap: 0.5rem;
    padding: 0;
    margin: 0;
}

.pagination li {
    border-radius: 4px;
    overflow: hidden;
    border: 1px solid #ddd;
}

.pagination li a {
    display: block;
    padding: 0.5rem 1rem;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    transition: all 0.3s ease;
}

.pagination li a:hover {
    background-color: #f8f9fa;
    color: rgba(27, 74, 105, 0.9);
}

.pagination li.active a {
    background-color: rgba(27, 74, 105, 0.9);
    color: white;
    border-color: rgba(27, 74, 105, 0.9);
}

.pagination li.disabled a {
    color: #6c757d;
    background-color: rgba(27, 74, 105, 0.9);
    cursor: not-allowed;
    pointer-events: none;
}

.pagination li:not(.disabled):not(.active) a:hover {
    background-color: #e9ecef;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>
<main class="main-content">
    <section class="content-section">
        <div class="content-header">
            <h2>Categories Of Posts</h2>
            <a href="<?=URL_ROOT?>/category/create" class="btn">
                <i class="fas fa-plus"></i>
                Add New Category
            </a>
        </div>
        <div class="table-container">
            <table width="50%">
                <thead>
                    <tr>
                        <th width="20%">Category ID</th>
                        <th width="50%">Category Name</th>
                        <th width="30%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <?php if (!empty($data['categories'])): ?>
                       <?php foreach($data['categories'] as $category): ?>
                           <tr>
                               <td><?= htmlspecialchars($category['id']) ?></td>
                               <td><?= htmlspecialchars($category['name']) ?></td>
                               <td>
                                   <a href="<?=URL_ROOT?>/category/update/<?= $category['id'] ?>" class="btn btn-edit">Edit</a>
                                   <a href="<?=URL_ROOT?>/category/delete/<?= $category['id'] ?>" class="btn btn-delete">Delete</a>
                               </td>
                           </tr>
                       <?php endforeach; ?>
                   <?php else: ?>
                       <tr>
                           <td colspan="3" style="text-align: center;">No categories found.</td>
                       </tr>
                   <?php endif; ?>
                </tbody>
            </table>
            <div class="table-footer">
                <h4>Total Categories: <?= $data['total_categories'] ?></h4>
            </div>
        </div>

        <?php if ($data['total_pages'] > 1): ?>
            <div class="table-pagination">
                <nav>
                    <ul class="pagination">
                        <li class="<?= $data['current_page'] <= 1 ? 'disabled' : '' ?>">
                            <a href="<?= $data['current_page'] > 1 ? URL_ROOT . '/category?page=' . ($data['current_page'] - 1) : '#' ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                            <li class="<?= $i === $data['current_page'] ? 'active' : '' ?>">
                                <a href="<?= URL_ROOT ?>/category?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="<?= $data['current_page'] >= $data['total_pages'] ? 'disabled' : '' ?>">
                            <a href="<?= $data['current_page'] < $data['total_pages'] ? URL_ROOT . '/category?page=' . ($data['current_page'] + 1) : '#' ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php $this->view('admin/inc/footer', []); ?>