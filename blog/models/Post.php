<?php
class Post
{
    private $pdo;

    public function __construct()
    {
        // Buď vytvoření nového PDO připojení:
        $this->pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // -- Pokud chcete místo toho použít config.php (sdílené $pdo):
        // require_once __DIR__ . '/../config.php';
        // $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        return $stmt->execute();
    }

    public function updatePost($id, $title, $content)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletePost($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
