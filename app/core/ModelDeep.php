<?php
// app/core/Model.php

class Model {
    protected $conn;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->dbConnection();
    }

    protected function ensureTableSet() {
        if (empty($this->table)) {
            // Log for developers
            error_log("Model configuration error: Table name not defined in " . get_class($this));
            
            // User-friendly exception
            if ($this->isDevelopment()) {
                throw new Exception('Table name must be defined in child class');
            } else {
                throw new Exception('System configuration error');
            }
        }
    }

    private function isDevelopment(): bool {
        return $_ENV['APP_ENV'] === 'development';
    }

    protected function sanitizeIdentifier($identifier) {
        // More restrictive pattern for safety
        if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $identifier)) {
            throw new Exception("Invalid identifier format");
        }
        return $identifier;
    }

    // CREATE
    public function create(array $data) {
        $this->ensureTableSet();
        
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
        $this->ensureTableSet();
        
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
        $this->ensureTableSet();
        
        $query = "SELECT * FROM `{$this->table}` 
                 WHERE `{$this->primaryKey}` = :id LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, array $data) {
        $this->ensureTableSet();
        
        $set = [];
        $params = [':id' => $id];
        
        foreach ($data as $column => $value) {
            $column = $this->sanitizeIdentifier($column);
            $param = ":set_{$column}";
            $set[] = "`{$column}` = {$param}";
            $params[$param] = $value;
        }
        
        $query = "UPDATE `{$this->table}` 
                 SET ".implode(', ', $set)." 
                 WHERE `{$this->primaryKey}` = :id";
        
        $stmt = $this->conn->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        
        return $stmt->execute();
    }

    public function getAllPosts() {
        $this->ensureTableSet();
        
        $query = "SELECT * FROM `{$this->table}` ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsByCategory($categoryId) {
        $this->ensureTableSet();
        
        $query = "SELECT * FROM `{$this->table}` WHERE `category_id` = :category_id ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPublishedPosts() {
        $this->ensureTableSet();
        
        $query = "SELECT * FROM `{$this->table}` WHERE `status` = 'published' ORDER BY `created_at` DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // DELETE
    public function delete($id) {
        $this->ensureTableSet();
        
        $query = "DELETE FROM `{$this->table}` 
                 WHERE `{$this->primaryKey}` = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // CROP AND RESIZE IMAGES
    public function cropImage($sourcePath, $targetPath, $width = 300, $height = 300) {
        // Check if source file exists
        if (!file_exists($sourcePath)) {
            throw new Exception('Source image not found');
        }

        // Check if GD is installed
        if (!extension_loaded('gd')) {
            throw new Exception('Image processing not available');
        }

        // Get image details
        list($originalWidth, $originalHeight, $type) = getimagesize($sourcePath);

        // Create image resource based on type
        switch ($type) {
            case IMAGETYPE_JPEG: $source = imagecreatefromjpeg($sourcePath); break;
            case IMAGETYPE_PNG: $source = imagecreatefrompng($sourcePath); break;
            case IMAGETYPE_GIF: $source = imagecreatefromgif($sourcePath); break;
            case IMAGETYPE_WEBP: $source = imagecreatefromwebp($sourcePath); break;
            default: throw new Exception('Unsupported image type');
        }

        // Check if image was created successfully
        if (!$source) {
            throw new Exception('Failed to process image');
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

        // Check if save was successful
        if (!$result) {
            throw new Exception('Failed to save processed image');
        }

        // Clean up
        imagedestroy($source);
        imagedestroy($target);

        return $result;
    }
}