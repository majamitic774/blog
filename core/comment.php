<?php

require_once 'core/autoload.php';

class Comment
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getComments($blogId)
    {
        $stmt = $this->conn->prepare("SELECT comments.*, users.username 
                                      FROM comments 
                                      JOIN users ON comments.user_id = users.id 
                                      WHERE comments.blog_id = :blog_id 
                                      ORDER BY comments.created_at ASC");
        $stmt->bindParam(':blog_id', $blogId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createComment($userId, $blogId, $content)
    {
        $stmt = $this->conn->prepare("INSERT INTO comments (user_id, blog_id, content) 
                                      VALUES (:user_id, :blog_id, :content)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':blog_id', $blogId);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function updateComment($commentId, $content)
    {
        $stmt = $this->conn->prepare("UPDATE comments SET content = :content 
                                      WHERE id = :id");
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $commentId);
        return $stmt->execute();
    }

    public function deleteComment($commentId)
    {
        $stmt = $this->conn->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $commentId);
        return $stmt->execute();
    }

    public function getCommentById($commentId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $commentId);
        $stmt->execute();
        return $stmt->fetch();
    }
}
