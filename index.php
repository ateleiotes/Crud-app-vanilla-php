<?php require_once("head.php"); ?>
<?php

// show form to submit file
echo "<br>";
echo "<br>";
echo "<div class='container justify-content-center align-content-center bg-dark border border-secondary rounded'; style='padding: 5%'; height: 70%'>";
echo "<h4 class='text-white'>Please choose a CSV file to upload</h4>";
echo "<br>";
echo "<br>";

echo "<form method='post' action='upload.php' enctype='multipart/form-data'>
      <div class='btn btn-dark'>
      <input type='file' name='fileToUpload' id='filetoUpload'>
      </div>
      <button type='submit' value='Upload' name='Upload' class='btn btn-dark'><img src='assets/img/upload.png' alt='Upload button' height='40' width='40'></button>
      </form>";
echo "</div>";
echo "</div>";

?>
<?php require_once("footer.php");?>
<a href="vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>