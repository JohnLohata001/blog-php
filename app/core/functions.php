<?php

// app/core/functions.php
function show($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * Set a flash message
 */
function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }
    }
}
function redirect($url) {
    header("Location: " . URL_ROOT . "/" . $url);
    exit();
}
// ======================
//  Display flash message
// ======================

function displayFlash($name = '') {

    if (isset($_SESSION[$name])) {
        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'alert alert-success';
        
        echo '<div class="' . htmlspecialchars($class) . '">' 
             . htmlspecialchars($_SESSION[$name]) 
             . '</div>';
        
        // Clear the message after displaying
        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
    }
}

// ====================================
// Function to generate slug from title
// ====================================

function generateSlug($title) {
    // Convert to lowercase
    $slug = strtolower(trim($title));
    
    // Replace spaces and underscores with hyphens
    $slug = preg_replace('/[\s_]+/', '-', $slug);
    
    // Remove all non-alphanumeric characters except hyphens
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
    
    // Replace multiple hyphens with single hyphen
    $slug = preg_replace('/-+/', '-', $slug);
    
    // Trim hyphens from both ends
    $slug = trim($slug, '-');
    
    // If slug is empty after processing, generate a random one
    if (empty($slug)) {
        $slug = 'post-' . uniqid();
    }
    
    return $slug;
}

