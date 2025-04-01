<?php
include 'database/config.php';
include 'components/header.php';
include 'components/sidebar.php';


$user_id = $_SESSION['id'];
echo $user_id;



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