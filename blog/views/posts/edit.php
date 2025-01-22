<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <?php if ($post): ?>
        <form method="post">
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>"><br><br>

            <label for="content">Content:</label><br>
            <textarea name="content" id="content"><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

            <button type="submit">Save</button>
        </form>
    <?php else: ?>
        <p>Post not found.</p>
    <?php endif; ?>
    <hr>
    <a href="/blog">Back to index</a>
</body>
</html>
