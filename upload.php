<?php
if (isset($_FILES['folder'])) {
    $targetDir = "uploads/" . $_POST['folder_name'] ?? rand(0000, 9999);
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    foreach ($_FILES['folder']['tmp_name'] as $key => $tmp_name) {
        $targetFile = $targetDir . '/' . basename($_FILES['folder']['name'][$key]);
        if (move_uploaded_file($_FILES['folder']['tmp_name'][$key], $targetFile)) {
            echo "Folder uploaded successfully.";
        } else {
            echo "Error uploading folder.";
        }
    }
}
