<?php

class Category extends Controller{

    public function index()
    {
        $category = $this->load_model('Categories');

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $category_per_page = 5;

        $offset = ($current_page - 1) * $category_per_page;
        
        // Get paginated categories
        $data['categories'] = $category->getAll($offset, $category_per_page);
        
        // Get total count for pagination (should be separate from the paginated results)
        $data['total_categories'] = $category->getTotalCount(); // You need to implement this method
        $data['current_page'] = $current_page;
        $data['category_per_page'] = $category_per_page;
        $data['total_pages'] = ceil($data['total_categories'] / $category_per_page);

        $this->view('admin/categories/index', $data);
    }
    public function create()
    {
        $this->view('admin/categories/create', []);
    }
    public function update($id){
        echo "Updating category with ID: " . htmlspecialchars($id);
        // exit;
        $category = $this->load_model('Categories');
        $data['category'] = $category->getCategoryName($id);

        $this->view('admin/categories/update', $data);
    }
    
}