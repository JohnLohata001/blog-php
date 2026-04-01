<?php

class Admin extends Controller
{
    public function index()
    {
        $PostModel = $this->load_model('PostsModel');  
        $categoryModel = $this->load_model('Categories');

        $data['count_posts'] = $PostModel->getTotalPosts();
        $data['categories'] = $categoryModel->getTotalPosts();



        $this->view('admin/dashboard', $data);
    }

    public function posts()
    {
        $data = [];
        $posts = $this->load_model('PostsModel');
        
        // Pagination settings
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $per_page = 6; // Number of posts per page
        $offset = ($page - 1) * $per_page;
        
        // Get paginated posts and total count
        $data['posts'] = $posts->getPaginatedPost($offset, $per_page);
        $total_posts = $posts->getTotalPosts();
        
        // Pagination data
        $data['current_page'] = $page;
        $data['total_pages'] = ceil($total_posts / $per_page);
        $data['per_page'] = $per_page;
        $data['total_posts'] = $total_posts;
        
        $this->view('admin/posts/index', $data);
    }

    // ----------------------
    // create new post method
    // ----------------------

    // public function create_post()
    // {
    //     $category = $this->load_model('Categories');
    //     $data['categories'] = $category->read();


    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //         // Load the model
    //         $post = $this->load_model('PostsModel');
       

            
    //         // Prepare data
    //         $data = [
    //             'title' => htmlspecialchars($_POST['title'] ?? ''),
    //             'slug' => generateSlug($_POST['title'] ?? ''),
    //             'content' => htmlspecialchars($_POST['content'] ?? ''),
    //             'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''), // Add this line
    //             'featured_image' => htmlspecialchars($_FILES['file']['featured_image'] ?? ''),
    //             'category_id' => htmlspecialchars($_POST['category_id'] ?? ''),
    //             'user_id' => 1, // Add this line
    //             'status' => htmlspecialchars($_POST['status'] ?? ''),
    //             'post_type' => htmlspecialchars($_POST['post_type'] ?? ''),
    //         ];
    //         // Create the post
           
    //         $result = $post->create($data);
    //         // Check result and redirect or show error
    //         if ($result) {
    //             flash('post_message', 'Post created successfully');
    //             $this->view('admin/posts/create', $data);
    //             // $this->redirect('admin/posts');
    //         } else {
    //             flash('post_message', 'Failed to create post', 'alert alert-danger');
    //             $this->view('admin/posts/create', $data);
    //         }
    //         exit;
    //     }
    //     // If not a POST request, just show the form
    //     $this->view('admin/posts/create', $data);
    // }

    // ==========================

    // public function create_post()
    // {
    //     $category = $this->load_model('Categories');
    //     $data['categories'] = $category->read();

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Load the model
    //         $post = $this->load_model('PostsModel');
            
    //         // Handle file upload
    //         $featured_image = '';
    //         if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
    //             $featured_image = $this->handleImageUpload($_FILES['featured_image']);
    //         }

    //         // Prepare data
    //         $data = [
    //             'title' => htmlspecialchars($_POST['title'] ?? ''),
    //             'slug' => generateSlug($_POST['title'] ?? ''),
    //             'content' => htmlspecialchars($_POST['content'] ?? ''),
    //             'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''),
    //             'featured_image' => $featured_image,
    //             'category_id' => htmlspecialchars($_POST['category_id'] ?? ''),
    //             'user_id' => 1,
    //             'status' => htmlspecialchars($_POST['status'] ?? ''),
    //             'post_type' => htmlspecialchars($_POST['post_type'] ?? ''),
    //         ];
            
    //         // Create the post
    //         $result = $post->create($data);
            
    //         // Check result and redirect or show error
    //         if ($result) {
    //             flash('post_message', 'Post created successfully');
    //             $this->view('admin/posts/create', $data);
    //         } else {
    //             flash('post_message', 'Failed to create post', 'alert alert-danger');
    //             $this->view('admin/posts/create', $data);
    //         }
    //         exit;
    //     }
        
    //     // If not a POST request, just show the form
    //     $this->view('admin/posts/create', $data);
    // }
    // ===================================
    //   create post method

    public function create_post()
    {
        $category = $this->load_model('Categories');
        $data['categories'] = $category->read();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $this->load_model('PostsModel');
            
            try {
                // Handle file upload
                $featured_image = '';
                if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
                    $featured_image = $this->handleImageUpload($_FILES['featured_image']);
                }

                // Prepare data
                $data = [
                    'title' => htmlspecialchars($_POST['title'] ?? ''),
                    'slug' => generateSlug($_POST['title'] ?? ''),
                    'content' => htmlspecialchars($_POST['content'] ?? ''),
                    'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''),
                    'featured_image' => $featured_image,
                    'category_id' => htmlspecialchars($_POST['category_id'] ?? ''),
                    'user_id' => 1,
                    'status' => htmlspecialchars($_POST['status'] ?? ''),
                    'post_type' => htmlspecialchars($_POST['post_type'] ?? ''),
                ];
                
                // Create the post
                $result = $post->create($data);
                
                if ($result) {
                    flash('post_message', 'Post created successfully');
                    redirect('admin/posts'); // Redirect to posts list
                } else {
                    throw new Exception('Failed to create post in database');
                }
                
            } catch (Exception $e) {
                flash('post_message', 'Error: ' . $e->getMessage(), 'alert alert-danger');
                $this->view('admin/posts/create', $data);
            }
            exit;
        }
        
        $this->view('admin/posts/create', $data);
    }





    // private function handleImageUpload($file)
    // {
    //     $uploadDir = URL_ROOT .'/assets/images/uploads/';
    //     $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    //     $maxFileSize = 5 * 1024 * 1024; // 5MB

    //     // Check file type
    //     if (!in_array($file['type'], $allowedTypes)) {
    //         throw new Exception('Invalid file type. Only JPG, PNG, GIF, and WebP are allowed.');
    //     }

    //     // Check file size
    //     if ($file['size'] > $maxFileSize) {
    //         throw new Exception('File size too large. Maximum size is 5MB.');
    //     }

    //     // Generate unique filename
    //     $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    //     $fileName = uniqid() . '_' . time() . '.' . $fileExtension;
    //     $uploadPath = $uploadDir . $fileName;

    //     // Create directory if it doesn't exist
    //     if (!is_dir($uploadDir)) {
    //         mkdir($uploadDir, 0755, true);
    //     }

    //     // Resize and save image
    //     if ($this->resizeImage($file['tmp_name'], $uploadPath, 1200, 800)) {
    //         // Also create thumbnail
    //         $thumbName = 'thumb_' . $fileName;
    //         $thumbPath = $uploadDir . $thumbName;
    //         $this->resizeImage($file['tmp_name'], $thumbPath, 300, 200);
            
    //         return $fileName;
    //     }

    //     throw new Exception('Failed to upload image.');
    // }

    private function handleImageUpload($file)
    {
        // Use local file system path, not URL
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/blog_sept/public/assets/images/uploads/';
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB

        // Check file type
        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception('Invalid file type. Only JPG, PNG, GIF, and WebP are allowed.');
        }

        // Check file size
        if ($file['size'] > $maxFileSize) {
            throw new Exception('File size too large. Maximum size is 5MB.');
        }

        // Generate unique filename
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '_' . time() . '.' . $fileExtension;
        $uploadPath = $uploadDir . $fileName;

        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Resize and save image
        if ($this->resizeImage($file['tmp_name'], $uploadPath, 1200, 800)) {
            // Also create thumbnail
            $thumbName = 'thumb_' . $fileName;
            $thumbPath = $uploadDir . $thumbName;
            $this->resizeImage($file['tmp_name'], $thumbPath, 300, 200);
            
            return $fileName; // Return only filename for database storage
        }

        throw new Exception('Failed to upload image.');
    }

    // ------------------------
    // image resizing 
    // -----------------------

    private function resizeImage($sourcePath, $destinationPath, $maxWidth, $maxHeight)
    {
        // Get image info
        list($originalWidth, $originalHeight, $type) = getimagesize($sourcePath);

        // Calculate new dimensions while maintaining aspect ratio
        $ratio = $originalWidth / $originalHeight;
        
        if ($maxWidth / $maxHeight > $ratio) {
            $newWidth = $maxHeight * $ratio;
            $newHeight = $maxHeight;
        } else {
            $newWidth = $maxWidth;
            $newHeight = $maxWidth / $ratio;
        }

        // Create image resource based on type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($sourcePath);
                break;
            case IMAGETYPE_WEBP:
                $sourceImage = imagecreatefromwebp($sourcePath);
                break;
            default:
                throw new Exception('Unsupported image type');
        }

        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG and GIF
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
        }

        // Resize image
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Save image based on type
        $result = false;
        switch ($type) {
            case IMAGETYPE_JPEG:
                $result = imagejpeg($newImage, $destinationPath, 85);
                break;
            case IMAGETYPE_PNG:
                $result = imagepng($newImage, $destinationPath, 8);
                break;
            case IMAGETYPE_GIF:
                $result = imagegif($newImage, $destinationPath);
                break;
            case IMAGETYPE_WEBP:
                $result = imagewebp($newImage, $destinationPath, 85);
                break;
        }

        // Free memory
        imagedestroy($sourceImage);
        imagedestroy($newImage);

        return $result;
    }

    // ----------------------
    // create new post method
    // ----------------------

    // public function edit_post($id = 0, $data = [])
    // {
    //     if (!$id) {
    //         redirect('admin/posts');
    //         return;
    //     }

    //     $postModel = $this->load_model('PostsModel');
    //     $categoryModel = $this->load_model('Categories');

    //     $data['post'] = $postModel->getById($id);
    //     $data['categories'] = $categoryModel->getAll();        
        
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //         $result = $postModel->update($id, $_POST);

    //         $update_data = [
    //             'title' => $_POST['title'],
    //             'content' => $_POST['content'],
    //             'excerpt' => $_POST['excerpt'],
    //             'status' => $_POST['status'],
    //             'post_type' => $_POST['post_type'],
    //             'category_id' => $_POST['category_id']
    //         ];

    //         $result = $postModel->update($id, $update_data);

    //         if ($result) {
    //             // $this->session->set_flashdata('success', 'Post updated successfully');
    //               redirect('admin/posts');
    //         } else {
    //             $this->session->set_flashdata('error', 'Failed to update post');
    //         }
            
    //         $this->view('admin/posts/edit_post', $id);
    //     } else {
    //         $data['post'] = $postModel->getById($id);
    //         $this->view('admin/posts/edit_post', $data);
    //     }
    // }


    public function edit_post($id = 0)
    {
        if (!$id) {
            redirect('admin/posts');
            return;
        }

        $postModel = $this->load_model('PostsModel');
        $categoryModel = $this->load_model('Categories');

        // Get current post data
        $data['post'] = $postModel->getById($id);
        $data['categories'] = $categoryModel->getAll();        
        
        if (!$data['post']) {
            flash('post_message', 'Post not found', 'alert alert-danger');
            redirect('admin/posts');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $update_data = [
                    'title' => htmlspecialchars($_POST['title'] ?? ''),
                    'slug' => generateSlug($_POST['title'] ?? ''),
                    'content' => htmlspecialchars($_POST['content'] ?? ''),
                    'excerpt' => htmlspecialchars($_POST['excerpt'] ?? ''),
                    'status' => htmlspecialchars($_POST['status'] ?? ''),
                    'post_type' => htmlspecialchars($_POST['post_type'] ?? ''),
                    'category_id' => htmlspecialchars($_POST['category_id'] ?? '')
                ];

                // Handle image upload if a new file is provided
                if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
                    // Delete old image files first
                    $this->deleteImageFiles($data['post']->featured_image);
                    
                    // Upload new image
                    $newImageName = $this->handleImageUpload($_FILES['featured_image']);
                    $update_data['featured_image'] = $newImageName;
                } else {
                    // Keep the existing image
                    $update_data['featured_image'] = $data['post']->featured_image;
                }

                $result = $postModel->update($id, $update_data);

                if ($result) {
                    flash('post_message', 'Post updated successfully');
                    redirect('admin/posts');
                } else {
                    flash('post_message', 'Failed to update post', 'alert alert-danger');
                    $this->view('admin/posts/edit_post', $data);
                }
                
            } catch (Exception $e) {
                flash('post_message', 'Error: ' . $e->getMessage(), 'alert alert-danger');
                $this->view('admin/posts/edit_post', $data);
            }
        } else {
            $this->view('admin/posts/edit_post', $data);
        }
    }




    // ----------------------
    // delete post method
    // ----------------------

    // public function delete_post($id){

    //     $PostModel = $this->load_model('PostModel');
    //     $data['id'] = $id;
    //     $data['delModel'] = null;


        
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
         
    //         $id =  $_POST['id'];
            

    //         if($id){

    //             $result = $PostModel->delete($id);
    //             if($result) {
    //                 $data['delModel'] = $result;
    //                 $data['message'] = "Post deleted successfully";
    //             } else {
    //                 $data['message'] = "Failed to delete post or post not found";
    //             }
    //         }
    //     }
        
    //     $this->view('admin/posts/delete_post', $data);

    // }

    // public function delete_post($id){
        
        
    //     $PostModel = $this->load_model('PostsModel');
        
    //     $data = [
    //         'id' => $id,
    //         'delModel' => null,
    //         'message' => ''
    //     ];

    //     // If ID is empty, check POST data
    //     if(empty($id) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = $_POST['id'] ?? null;
    //         $data['id'] = $id;
    //     }

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    //         if(!empty($id)){
    //             $result = $PostModel->delete($id);
    //             if($result) {
    //                 $data['delModel'] = $result;
    //                 $data['message'] = "Post deleted successfully";
    //                 // Optional: Redirect after success
    //                 header('Location: ' . URL_ROOT . '/admin/posts/index');
    //                 exit;
    //             } else {
    //                 $data['message'] = "Failed to delete post or post not found";
    //             }
    //         } else {
    //             $data['message'] = "Post ID is required";
    //         }
    //     }
        
    //     $this->view('admin/posts/delete_post', $data);
    // } 

    // =====================================================

    public function delete_post($id)
    {
        $PostModel = $this->load_model('PostsModel');
        
        $data = [
            'id' => $id,
            'delModel' => null,
            'message' => ''
        ];

        // If ID is empty, check POST data
        if(empty($id) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $data['id'] = $id;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            if(!empty($id)){
                // First, get the post to find the image filename
                $post = $PostModel->getById($id);
                
                if ($post) {
                    // Delete the image files if they exist
                    $this->deleteImageFiles($post->featured_image);
                    
                    // Then delete the post from database
                    $result = $PostModel->delete($id);
                    
                    if($result) {
                        $data['delModel'] = $result;
                        $data['message'] = "Post deleted successfully";
                        // Optional: Redirect after success
                        header('Location: ' . URL_ROOT . '/admin/posts/index');
                        exit;
                    } else {
                        $data['message'] = "Failed to delete post from database";
                    }
                } else {
                    $data['message'] = "Post not found";
                }
            } else {
                $data['message'] = "Post ID is required";
            }
        }
        
        $this->view('admin/posts/delete_post', $data);
    }

    // Add this helper method to delete image files
    private function deleteImageFiles($fileName)
    {
        if (!empty($fileName)) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/blog_sept/public/assets/images/uploads/';
            
            $mainImage = $uploadDir . $fileName;
            $thumbImage = $uploadDir . 'thumb_' . $fileName;
            
            // Delete main image
            if (file_exists($mainImage)) {
                unlink($mainImage);
            }
            
            // Delete thumbnail
            if (file_exists($thumbImage)) {
                unlink($thumbImage);
            }
        }
    }



    public function search()
    {
        if (isset($_GET['q'])) {
        $query = trim($_GET['q']);
        $posts = $this->load_model('PostModel')->searchPosts($query);

            $this->view('posts/search', ['posts' => $posts, 'query' => $query]);
        } else {
            header("Location: " . URL_ROOT . "/posts");
            exit;
        }
    }
}

