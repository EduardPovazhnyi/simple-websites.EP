<?php
include 'database/config.php';
include 'components/header.php';
include 'components/sidebar.php';


$user_id = $_SESSION['id'];
echo $user_id;

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

// Prepare and execute the blog query
$user_comments  = $conn->prepare("SELECT 
   content,
   status
    
FROM blog_comments 
WHERE user_id = $user_id");
$user_comments ->execute();
$user_comments ->store_result();
$user_comments ->bind_result($content, $status);




?>
<div class="relative font-[sans-serif] pt-[70px] h-screen">

  
    <div>
    <?php if($user_comments->num_rows === 0) : ?>
         
      <p>No comments added</p>
        <?php else : ?>
     <?php while($user_comments->fetch()) : ?>
  
      <p><?= $content ?></p>
      <p><?= $status ?></p>
      <?php endwhile ?>
      <?php endif ?>

      

    </div>
  </div>
<?php
include 'components/footer.php';
?>