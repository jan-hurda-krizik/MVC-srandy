<?php
require_once 'models/Post.php';

class PostController
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    public function index()
    {
        $posts = $this->postModel->getAllPosts();
        require_once 'views/posts/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            if (!empty($title) && !empty($content)) {
                $this->postModel->createPost($title, $content);
                header("Location: /blog");
                exit;
            } else {
                echo "Title and content are required!";
            }
        }
        require_once 'views/posts/create.php';
    }

    public function edit($id = null)
    {
        if ($id) {
            $post = $this->postModel->getPostById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $this->postModel->updatePost($id, $title, $content);
                header("Location: /blog");
                exit;
            } else {
                require_once 'views/posts/edit.php';
            }
        } else {
            echo "Post ID is required for editing.";
        }
    }

    public function delete($id = null)
    {
        if ($id) {
            $deleted = $this->postModel->deletePost($id);
            if ($deleted) {
                header("Location: /blog");
                exit;
            } else {
                echo "Error deleting post.";
            }
        } else {
            echo "Post ID is required for deletion.";
        }
    }

    public function view($id = null)
    {
        if ($id) {
            $post = $this->postModel->getPostById($id);
            if ($post) {
                echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($post['content'])) . "</p>";
            } else {
                echo "Post not found.";
            }
        } else {
            echo "Post ID is required for viewing.";
        }
    }
}
