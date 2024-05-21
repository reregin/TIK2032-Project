<?= require '../db_connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="blog-page" style="background-color: #D0E1EB;">
    <nav id="blog-nav">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li type="button"><a href="#footer">Contact</a></li>
            <li>⚘</li>
        </ul>
    </nav>

    <main>
        <div id="blog-title">
            <h1>Blog</h1>
        </div>
        <hr style="opacity: 0;">
        <section id="blog-list">
            <?php
                $sql = "SELECT * FROM blogpreview";
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    while ($row = mysqli_fetch_assoc($result)){
            ?>
            <article>
                <h2><?= $row['title'] ?></h2>
                <p>
                    <i>Category: <?= $row['category'] ?></i>
                    <br><blockquote><?= $row['description'] ?></blockquote>
                </p>
                <a href="blog-content.php?id=<?= $row['id'] ?>">Read More</a>
            </article>

            <?php
                    }
                }
            ?>
        </section>
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