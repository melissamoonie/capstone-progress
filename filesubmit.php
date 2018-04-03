<?php
    //phpinfo();
if (isset($_FILES["fileUpload"]["name"]))
{
// print_r($_FILES["fileUpload"]);
$imageFile = ($_FILES["fileUpload"]["name"]);
    //echo $imageFile;
$imageType = ($_FILES["fileUpload"]["type"]);
$validext = array(
"jpeg",
"jpg",
"png"
);
$fileExt = pathinfo($imageFile, PATHINFO_EXTENSION);
echo $fileExt . "<br />";
$ready = false;
if ((($imageType == "image/jpeg") || ($imageType == "image/jpg") || ($imageType == "image/png")) && in_array($fileExt, $validext))
{
$ready = true;
echo "was valid image<br />";
}
 else
{
echo "was not an image<br />";
}

if ($_FILES["fileUpload"]["size"] < 10000000)
{
$ready = true;
echo "file size is " . $_FILES["fileUpload"]["size"] . "<br />";
}
 else
{
echo "file was TOO BIG!<br />";
$ready = false;
}

if ($_FILES["fileUpload"]["error"])
{
echo "looks like there was an error " . $_FILES["fileUpload"]["error"] . "<br />";
$ready = false;
}

$targetPath = "images/" . $imageFile;
$sourcePath = $_FILES["fileUpload"]["tmp_name"];
if (file_exists($targetPath))
{
echo "File already there <br />";
$ready = false;
}

if ($ready == true)
{
move_uploaded_file($sourcePath, $targetPath);
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP image Upload</title>
    </head>
<body>
    <form action="filesubmit.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" value="Upload file">
    </form>
    </body>
</html>