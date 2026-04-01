<?php
// app/controllers/Posts.php
class Posts extends Controller{

    public function index()
    {
        $postsModel = $this->load_model('PostsModel');
        
        // Pagination parameters
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts_per_page = 6; // Adjust as needed
        
        // Calculate offset
        $offset = ($current_page - 1) * $posts_per_page;
        
        // Get paginated posts using your existing Model methods
        $posts = $postsModel->read(['status' => 'published'], $posts_per_page, $offset);
        $total_posts = count($postsModel->read(['status' => 'published']));
        
        $categoriesModel = $this->load_model('Categories');
        $categories = $categoriesModel->getCategoryWithPostCount();
        
        $this->view('posts', [
            'posts' => $posts,
            'categories' => $categories,
            'current_page' => $current_page,
            'total_pages' => ceil($total_posts / $posts_per_page),
            'total_posts' => $total_posts,
            'posts_per_page' => $posts_per_page
        ]);
    }

    public function category($id = null) 
    {
        if ($id) {
            $postsModel = $this->load_model('PostsModel');
            $categoriesModel = $this->load_model('Categories');
            
            // Pagination parameters
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $posts_per_page = 6;
            $offset = ($current_page - 1) * $posts_per_page;
            
            // Get total posts count for this category
            $all_category_posts = $postsModel->getPostsByCategory($id);
            $total_posts = count($all_category_posts);
            
            // Apply manual pagination (or use database LIMIT for better performance)
            $data['posts'] = array_slice($all_category_posts, $offset, $posts_per_page);
            
            // Alternative: Use database-level pagination (better for large datasets)
            // You would need to add a method in your PostsModel like:
            // $data['posts'] = $postsModel->getPaginatedPostsByCategory($id, $posts_per_page, $offset);
            // $total_posts = $postsModel->getTotalPostsByCategory($id);
            
            // Get category name
            $category = $categoriesModel->getById($id);
            $data['category_name'] = $category['name'] ?? 'Unknown Category';
            
            // Pagination data
            $data['current_page'] = $current_page;
            $data['total_pages'] = ceil($total_posts / $posts_per_page);
            $data['total_posts'] = $total_posts;
            $data['posts_per_page'] = $posts_per_page;
            $data['category_id'] = $id;
            
        } else {
            $data['posts'] = [];
            $this->view('404');
            return;
        }

        $this->view('category', $data);
    }

    public function details($id = null) {
        if ($id) {
            $postsModel = $this->load_model('PostsModel');
            $post = $postsModel->getById($id);
            
            if ($post) {
                $this->view('details', ['post' => $post]);
            } else {
                $this->view('404');
            }
        } else {
            $this->view('404');
        }
        
    }
    
    public function insert() {

        $this->view('admin/posts/insertpost', []);
    }

    public function search()
    {
        if (isset($_GET['q'])) {

            $query = trim($_GET['q']);
            $posts = $this->load_model('PostsModel')->searchPosts($query);
           
            $this->view('search', ['posts' => $posts, 'query' => $query]);

        } else {
            header("Location: " . URL_ROOT . "/posts");
            exit;
        }
    }
}