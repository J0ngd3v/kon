<?php
if (isset($_FILES['image'])) {
    $uploadDirectory = 'uploads/';
    $filename = $uploadDirectory . 'image_' . time() . '.png';

    if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
        echo 'Image saved successfully';
    } else {
        echo 'Error saving image';
    }
} else {
    echo 'No image data received';
}
?>
