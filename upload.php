<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$oldname = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newName = $target_dir."usable.csv";
// check if file is a actual real or fake
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is a csv - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a csv.";
        $uploadOk = 0;
    }
}
 //check if file already exists
if (file_exists($target_file)) {
    unlink("uploads/usable.php");
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        echo "<script>window.location = \"display.php\";</script>";
        if (file_exists($newName)) {
            unlink("uploads/usable.csv");
            rename($oldname, $newName);
        } else {
            rename($oldname, $newName);
        }
    }
// check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// allow certain file formats
    if ($fileType != "csv") {
        echo "Sorry, only CSV files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            echo "<script>window.location = \"display.php\";</script>";
            if (file_exists($newName)) {
                unlink("uploads/usable.csv");
                rename($oldname, $newName);
            } else {
                rename($oldname, $newName);
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>
