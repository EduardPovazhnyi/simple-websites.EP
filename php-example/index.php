<?php
// Get the requested URL from the 'url' query parameter
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

// Define available routes (URL => corresponding PHP file)
$routes = [
    '' => 'pages/home.php',          // Home route
    'home' => 'pages/home.php',
    'contact' => 'pages/contact.php',          // contact route
    'register' => 'pages/register.php',    // register page route
    'login' => 'pages/login.php', // login page route
    'admin_dashboard' => 'pages/admin/admin_dashboard.php', // blog page route
    'blog_list' => 'pages/blog_list.php',
    'admin' => 'pages/admin/dashboard.php', // admin page route
    'user_profile' => 'pages/user/user_profile.php', // user page route
    'blog_details' => 'pages/blog_details.php', // blog ID page
    'error_404' => 'pages/error_404.php', 

    // configuration files
    'registerController' => 'controller/registerController.php',
    'loginController' => 'controller/loginController.php',
    'logout' => 'controller/logoutController.php',
  
];

// Check if the URL matches a route
if (array_key_exists($url, $routes)) {
    require $routes[$url];  // Load the appropriate file for the route
} else {
    // If no route matches, show a 404 page
    require 'pages/error_404.php';
}
?>
