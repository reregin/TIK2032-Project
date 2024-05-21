<?php
// Include the database connection
include 'db_connection.php';

// Get the blog ID from the URL
$blogId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the blog data based on the ID
$sql = "SELECT * FROM blog WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blogId);
$stmt->execute();
$result = $stmt->get_result();

// Check if the blog post exists
if ($result->num_rows > 0) {
    $blog = $result->fetch_assoc();
} else {
    echo "Blog post not found.";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?></title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li type="button"><a href="#footer">Contact</a></li>
            <li>⚘</li>
        </ul>
    </nav>

    <main>
        <article class="article-content">
            <br><h2><?php echo htmlspecialchars($blog['title']); ?></h2>
            
            <img src="<?php echo htmlspecialchars($blog['image_url']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="article-image">

            <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
        </article>
        <br><br><br>
    </main>

    <footer id="footer">
    <ul>
        <li class="footer-item"><a href="https://www.linkedin.com/in/regina-george/">LinkedIn</a></li>
        <li class="footer-item"><a href="mailto:reginageo22@gmail.com">reginageo22@gmail.com</a></li>
        <li class="footer-item"><a href="https://github.com/reregin">GitHub</a></li>
    </ul>
    <p>&copy; 2024 Regina George's Personal Website.</p>
</footer>
<script src="../main.js"></script>
</body>
</html>