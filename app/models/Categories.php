<?php
// app/models/Categories.php
class Categories extends Model {
    
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function getCategoryWithPostCount() {
        $sql = "SELECT c.id, c.name, COUNT(p.id) AS post_count
                FROM categories c
                LEFT JOIN posts p ON c.id = p.category_id
                GROUP BY c.id, c.name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryName($id) {
        $sql = "SELECT name FROM categories WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['name'] : null;
    }

    public function getAll($offset, $limit)
    {
        $query = "SELECT id, name FROM {$this->table} ORDER BY name ASC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCount()
    {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }



   
}