<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo $targetFile; 
    } else {
        echo 'Error uploading the file.';
    }
} else {
    echo 'Invalid request.';
}
?>
