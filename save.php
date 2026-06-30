<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form inputs
    $name = htmlspecialchars($_POST['username']);
    $message = htmlspecialchars($_POST['message']);
    
    // Format the data line
    $data = "Name: " . $name . " | Message: " . $message . "\n";
    
    // Append the data to 'submissions.txt'
    // FILE_APPEND keeps previous data; LOCK_EX prevents concurrent write issues
    file_put_contents('submissions.txt', $data, FILE_APPEND | LOCK_EX);
    
    // Redirect back or show a success message
    echo "Thank you! Your response has been saved.";
}
?>