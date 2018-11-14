<?php
include_once '../classes/class.dbc.php';
include_once '../includes/functions.php';

include_once '../classes/class.ImageUploader.php';
include_once '../classes/class.ErrorLogger.php';
include_once '../classes/class.CheckPlate.php';
include_once '../classes/class.Base64Image.php';

$mysql_date = date("Y-m-d");

if(isset($_POST['upload']))
{
    $tmp = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];

    $spl = new SplFileInfo($fileName);
    $extention = strtolower($spl->getExtension());

    //handle test post
    $uploadObject = new ImageUploader($tmp, $extention);
    $imageName  = $uploadObject->uploadFile();
    $imageURL = $uploadObject->getFilePath();

    //prepare do the plate recognition
    $plate = new CheckPlate($imageURL);
    echo 'All done';

}

//now upload a base 64 image
if(isset($_POST['base']))
{
    $imageData = filter($_POST['image']);
    $imageObject = new Base64Image($imageData);
    $imageObject->uploadFile();

    $imageURL = $imageObject->getFilePath();

    //run the number plate
    $plate = new CheckPlate($imageURL);

    echo 'All done';

}



 ?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>UPload image</title>
    </head>
    <body>
        <form class="" action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image" value=""
            >
            <input type="submit" name="upload" value="Upload image">
        </form>
    </body>
</html> -->
