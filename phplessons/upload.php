<?php
if (isset($_POST['submit'])){
$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileActualExt, $allowed)) {
if ($fileError === 0){
if ($fileSize < 5000000){
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = 'uploads/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);
    header("Location: index.php?uploadsuccess");
} else{
    echo "Your file is too big";
}
}else {
    echo "There was an error uploading your file!";
}
}
else{
    echo "You cannot upload files of this type!";
}
$image1 = 'Sticker-on-Laptop-Mockup-1.jpg';

 $image2 = '$file';

 list($width,$height) = getimagesize($image2);


 $image1 = imagecreatefromstring(file_get_contents($image1));
 $image2 = imagecreatefromstring(file_get_contents($image2));

 imagecopymerge($image1, $image2, 100, 150, 0, 0, $width, $height, 100);
 header('Content-Type: image/jpg');
 imagejpg($image1);

} 