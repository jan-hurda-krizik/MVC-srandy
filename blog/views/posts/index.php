<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog - Index</title>
</head>
<body>
    <h1>All Posts</h1>
    <a href="/blog/create">Create new post</a>
    <hr>

    <ul>
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <li>
                    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <a href="/blog/edit?id=<?php echo $post['id']; ?>">Edit</a> |
                    <a href="/blog/delete?id=<?php echo $post['id']; ?>">Delete</a> |
                    <a href="/blog/view?id=<?php echo $post['id']; ?>">View</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No posts found.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
