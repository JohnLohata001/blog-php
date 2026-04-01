<?php
// app/models/PostsModel.php
class PostsModel extends Model {
    
    protected $table = 'posts';
    protected $primaryKey = 'id';

    public function getPostsByCategory($categoryId) {
        $query = "SELECT * FROM `{$this->table}` 
                WHERE `category_id` = :category_id 
                AND `status` = 'published' 
                ORDER BY `created_at` DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Optional: More efficient pagination method
    public function getPaginatedPosts($page = 1, $per_page = 6) {
        $offset = ($page - 1) * $per_page;
        $query = "SELECT * FROM `{$this->table}` 
                 WHERE `status` = 'published' 
                 ORDER BY `created_at` DESC 
                 LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPublishedPosts() {
        $query = "SELECT COUNT(*) as total FROM `{$this->table}` WHERE `status` = 'published'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }


    public function getPaginatedPostsByCategory($categoryId, $limit = 6, $offset = 0) {
        $query = "SELECT * FROM `{$this->table}` 
                WHERE `category_id` = :category_id 
                AND `status` = 'published' 
                ORDER BY `created_at` DESC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPostsByCategory($categoryId) {
        $query = "SELECT COUNT(*) as total FROM `{$this->table}` 
                WHERE `category_id` = :category_id 
                AND `status` = 'published'";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['total'] ?? 0;
    }


    // =================Admin part===========================

    public function getPaginatedPost($offset, $per_page)
    {
        $query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(2, (int)$per_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPosts($string)
    {
        $sql = "SELECT * FROM posts 
                WHERE title LIKE :search 
                OR content LIKE :search";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['search' => "%$string%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    


}