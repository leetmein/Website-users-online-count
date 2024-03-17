<?php
// 1. Remove old users (over 7sec)
$folder = '../USR/';
foreach(glob($folder . '*') as $file) {
    if (time() - filemtime($file) > 7) {
        unlink($file);
    }
}

// 2. Generating a base64 name based on IP and Agent for the file
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$user_data = $ip . '$' . $agent;
$base64_encoded_data = base64_encode($user_data);
$file_name = $base64_encoded_data;
file_put_contents($folder . $file_name, '');

// 3. Count and display the number of users in a folder
$file_count = count(glob($folder . '*'));
$ileusr = $file_count;
?>
