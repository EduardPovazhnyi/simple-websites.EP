<?php
include 'database/config.php';
include 'components/header.php';

// Check if 'bid' is set in the URL
if (!isset($_GET['bid']) || empty($_GET['bid'])) {
    die("Error: Blog ID is missing.");
}

$blogId = intval($_GET['bid']); // Ensure it's an integer

// Prepare and execute the blog query
$blog = $conn->prepare("SELECT 
    b.title, 
    b.image_url, 
    b.content, 
    b.status, 
    b.created_at, 
    u.username,
    u.profile_image -- Add profile_image column
    
FROM blog b 
INNER JOIN users u ON b.author_id = u.id 
WHERE b.id = ?");
$blog->bind_param("i", $blogId); // Bind parameter to prevent SQL injection
$blog->execute();
$blog->store_result();

// Check if the blog post exists
if ($blog->num_rows === 0) {
    die("Error: Blog post not found.");
}

$blog->bind_result($blogTitle, $blogImg, $blogContent, $blogStatus, $created, $username, $authorImg);
$blog->fetch();
$blog->close();

// Format the date
$date = new DateTime($created);
$formattedDate = $date->format("F j, Y, g:i A");

// Fetch blog comments
$blogComment = $conn->prepare("SELECT 
    bc.content, 
    bc.created_at, 
    u.username,
    u.profile_image  -- Add profile_image column

FROM blog_comments bc
INNER JOIN users u ON bc.user_id = u.id
WHERE bc.blog_id = ? ");
$blogComment->bind_param("i", $blogId);
$blogComment->execute();
$blogComment->store_result();
$blogComment->bind_result($comment, $commentCreated, $commentUsername, $userImg);
?>

<div class="font-sans bg-gray-100 px-4 py-12">
    <div class="grid lg:grid-cols-2 gap-12 lg:max-w-6xl max-w-2xl mx-auto">
        <div class="text-left">
            <h2 class="text-gray-800 text-3xl font-bold mb-6"><?php echo htmlspecialchars($blogTitle); ?></h2>
            <p class="mb-4 text-sm text-gray-500"><?php echo nl2br(htmlspecialchars($blogContent)); ?></p>
            
            <!-- Display author's profile image -->
            <div class="mt-4 flex items-center">
              <img src="<?= ROOT_DIR ?>assets/img/<?php echo htmlspecialchars($authorImg); ?>"
              alt="Author Image"
              class="w-12 h-12 rounded-full object-cover mr-4">
              <div>
                <p class="text-sm text-gray-500"><strong>Author:</strong> <?php echo htmlspecialchars($username); ?></p>
                <p class="text-sm text-gray-500"><strong>Published on:</strong> <?php echo $formattedDate; ?></p>
              </div>
            </div>
            
            
        </div>
        <div>
            <img src="<?=ROOT_DIR ?>assets/img/<?php echo htmlspecialchars($blogImg); ?>" alt="Blog Image" class="rounded-lg object-contain w-full h-full" />
        </div>
    </div>
</div>

<h3 class="text-xl font-bold mt-6">Comments</h3>
<div class="mt-4">
    <?php while ($blogComment->fetch()): ?>
        <div class="bg-white shadow-md p-4 rounded-lg mb-4">
            <!-- Display user profile image -->
            <div class="flex items-center mb-2">
                <img src="<?= ROOT_DIR ?>assets/img/<?php echo htmlspecialchars($userImg); ?>" alt="User Image" class="w-10 h-10 rounded-full object-cover mr-3">
                <p class="text-sm text-gray-600"><strong><?php echo htmlspecialchars($commentUsername); ?></strong> - <?php echo date("F j, Y, g:i A", strtotime($commentCreated)); ?></p>
            </div>
            <p class="text-gray-800"><?php echo nl2br(htmlspecialchars($comment)); ?></p>
        </div>
    <?php endwhile; ?>
</div>

<?php
$blogComment->close();
include 'components/footer.php';
?>
