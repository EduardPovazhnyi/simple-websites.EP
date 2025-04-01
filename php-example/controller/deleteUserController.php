<?php
include 'database/config.php';
session_start();
$uid = isset($_GET['uid']) ? (int) $_GET['uid'] : 0;
// Ensure that the cid is sanitized or validated as an integer

$delete_comment = $conn->prepare("DELETE 
FROM blog_comments
WHERE user_id = ?");
// Bind the parameter (i = integer)
$delete_comment->bind_param("i", $uid);
// Execute the query
$delete_comment->execute();
   
// Close the statement
$delete_comment->close();

//--------------------------------------------------------------------------------------
$delete_user_blog = $conn->prepare("DELETE 
FROM blog
WHERE author_id = ?");

// Bind the parameter (i = integer)
$delete_user_blog->bind_param("i", $uid);
// Execute the query
$delete_user_blog->execute();

// Close the statement
$delete_user_blog->close();

// -------------------------------------------------------------------------------------------

$delete_user = $conn->prepare("DELETE 
FROM users
WHERE id = ?");

// Bind the parameter (i = integer)
$delete_user->bind_param("i", $uid);
// Execute the query
if ($delete_user->execute()) {
    $_SESSION['status_message'] = "User updated successfully!";
} else {
    $_SESSION['status_message'] = "Error: " . $conn->error;
}

// Close the statement
$delete_user->close();

    

// Redirect back to the comments page
header("Location: admin_dashboard");
exit();
?>