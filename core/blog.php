<?php
require_once 'database.php';

class Blog
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getAllBlogs()
    {
        $stmt = $this->conn->prepare("SELECT blogs.id, blogs.title, blogs.content, users.username, blogs.created_at
    FROM blogs
    JOIN users ON blogs.user_id = users.id
    ORDER BY blogs.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createBlog($userId, $title, $content)
    {
        $stmt = $this->conn->prepare("INSERT INTO blogs (user_id, title, content) VALUES (:user_id, :title, :content)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function getUserBlogs($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM blogs WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteBlog($blogId)
    {
        $stmt = $this->conn->prepare("DELETE FROM blogs WHERE id = :id");
        $stmt->bindParam(':id', $blogId);
        return $stmt->execute();
    }

    public function getBlogById($blogId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM blogs WHERE id = :id");
        $stmt->bindParam(':id', $blogId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateBlog($blogId, $title, $content)
    {
        $stmt = $this->conn->prepare("UPDATE blogs SET title = :title, content = :content WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $blogId);
        return $stmt->execute();
    }
}
