<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form inputs
    $name = htmlspecialchars($_POST['Name']);
    $quantity = htmlspecialchars($_POST['Quantity']);
    $time = htmlspecialchars($_POST['Time']);
    $rate = htmlspecialchars($_POST['Rate']);
    $restock = htmlspecialchars($_POST['Restock']);
    
    // Format the data line
    $data = "Name: " . $name . " | Quantity: " . $quantity . " | Time: " . $time . " | Rate: " . $rate . "  | Restock: " . $restock ."\n";
    
    // Append the data to 'submissions.txt'
    // FILE_APPEND keeps previous data; LOCK_EX prevents concurrent write issues
    file_put_contents('submissions.txt', $data, FILE_APPEND | LOCK_EX);
    
    // Redirect back or show a success message
    echo "Thank you! Your response has been saved.";
}
?>