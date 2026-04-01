<?php
// app/core/Model.php

class Model {
    protected $conn;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->dbConnection();
        
        if (empty($this->table)) {
            throw new Exception('Table name must be defined in child class');
        }
    }

    protected function sanitizeIdentifier($identifier) {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $identifier)) {
            throw new Exception("Invalid identifier: {$identifier}");
        }
        return $identifier;
    }

    // CREATE
    public function create(array $data) {
        $columns = [];
        $placeholders = [];
        $values = [];
        
        foreach ($data as $column => $value) {
            $column = $this->sanitizeIdentifier($column);
            $columns[] = "`{$column}`";
            $placeholders[] = ":{$column}";
            $values[":{$column}"] = $value;
        }
        
        $query = "INSERT INTO `{$this->table}` 
                 (".implode(', ', $columns).") 
                 VALUES (".implode(', ', $placeholders).")";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($values);
    }

    // READ (with flexible conditions)
    public function read(array $conditions = [], $limit = null, $offset = null) {
        $query = "SELECT * FROM `{$this->table}`";
        $params = [];
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $column => $value) {
                $operator = '=';
                if (strpos($column, ' ') !== false) {
                    list($column, $operator) = explode(' ', $column, 2);
                }
                $column = $this->sanitizeIdentifier($column);
                
                $param = ":where_{$column}";
                $where[] = "`{$column}` {$operator} {$param}";
                $params[$param] = $value;
            }
            $query .= " WHERE " . implode(' AND ', $where);
        }

        $query .= " ORDER BY id DESC";

        if ($limit !== null) {
            $query .= " LIMIT :limit";
            $params[':limit'] = (int)$limit;
            
            if ($offset !== null) {
                $query .= " OFFSET :offset";
                $params[':offset'] = (int)$offset;

            }

            
        }
        
        $stmt = $this->conn->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // GET BY ID
    public function getById($id) {
        $query = "SELECT * FROM `{$this->table}` 
                 WHERE `{$this->primaryKey}` = :id LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, array $data) {
        $set = [];
        $params = [];
        
        foreach ($data as $column => $value) {
            $set[] = "`{$column}` = ?";  // Positional parameter
            $params[] = $value;
        }
        
        // Add the ID as the last parameter
        $params[] = $id;
        
        $query = "UPDATE `{$this->table}` SET ".implode(', ', $set)." WHERE `{$this->primaryKey}` = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params); // Now parameters match
    }


    public function getAllPosts() {
        $query = "SELECT * FROM `{$this->table}` ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsByCategory($id) {
        $query = "SELECT * FROM `{$this->table}` WHERE `id` = :id ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPublishedPosts() {
        $query = "SELECT * FROM `{$this->table}` WHERE `status` = 'published' ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // DELETE
    public function delete($id) {
        $query = "DELETE FROM `{$this->table}` 
                 WHERE `{$this->primaryKey}` = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    // COUNT RECORDS

    public function getTotalPosts()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM {$this->table}");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$result['total'];
    }


    // CROP AND RESIZE IMAGES
    public function cropImage($sourcePath, $targetPath, $width = 300, $height = 300) {
        // Check if GD is installed
        if (!extension_loaded('gd')) {
            throw new Exception('GD library not installed');
        }

        // Get image details
        list($originalWidth, $originalHeight, $type) = getimagesize($sourcePath);

        // Create image resource based on type
        switch ($type) {
            case IMAGETYPE_JPEG: $source = imagecreatefromjpeg($sourcePath); break;
            case IMAGETYPE_PNG: $source = imagecreatefrompng($sourcePath); break;
            case IMAGETYPE_GIF: $source = imagecreatefromgif($sourcePath); break;
            default: throw new Exception('Unsupported image type');
        }

        // Calculate crop dimensions (center crop)
        $aspectRatio = $originalWidth / $originalHeight;
        $targetRatio = $width / $height;

        if ($aspectRatio > $targetRatio) {
            // Original is wider - crop horizontally
            $newWidth = $originalHeight * $targetRatio;
            $newHeight = $originalHeight;
            $srcX = ($originalWidth - $newWidth) / 2;
            $srcY = 0;
        } else {
            // Original is taller - crop vertically
            $newWidth = $originalWidth;
            $newHeight = $originalWidth / $targetRatio;
            $srcX = 0;
            $srcY = ($originalHeight - $newHeight) / 2;
        }

        // Create target image
        $target = imagecreatetruecolor($width, $height);

        // Preserve transparency for PNG/GIF
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($target, imagecolorallocatealpha($target, 0, 0, 0, 127));
            imagealphablending($target, false);
            imagesavealpha($target, true);
        }

        // Crop and resize
        imagecopyresampled(
            $target, $source,
            0, 0, $srcX, $srcY,
            $width, $height,
            $newWidth, $newHeight
        );

        // Save image
        switch ($type) {
            case IMAGETYPE_JPEG: $result = imagejpeg($target, $targetPath, 90); break;
            case IMAGETYPE_PNG: $result = imagepng($target, $targetPath, 9); break;
            case IMAGETYPE_GIF: $result = imagegif($target, $targetPath); break;
            case IMAGETYPE_WEBP: $result = imagewebp($target, $targetPath, 90); break;
        }

        // Clean up
        imagedestroy($source);
        imagedestroy($target);

        return $result;
    }
}