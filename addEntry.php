<?php require_once("head.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2018-10-03
 * Time: 2:54 PM
 */
// Get table headers and put into usable array
// Open file stream; mode read
$f = fopen("uploads/usable.csv","r");
$myFile = "uploads/usable.csv";
$lines = file($myFile); //file to array
$data = $lines[1];
$arr = explode(',', $data);
// Get title of csv document and place as header of page
$title = fgets($f);
echo "<br>";
echo "<br>";
echo "<div class='container justify-content-center bg-dark border border-secondary rounded'>";
echo "<br>";
echo "<h6 class='text-white'>$title</h6>";
echo "<br>";

echo "<form method='post' action='addEntry.php' class='text-white'>";
for($j = 0; $j< count($arr); $j++) {
    echo "$arr[$j]:";
    echo "<br>";
    echo "<input type='text' name='$j'>";
    echo "<br>";
}
echo "<br>";
echo "<input type='submit' name='submit'>";
echo "</form>";
echo "<br>";
echo "</div>";

if (isset($_POST['submit']))
{
    $data = null;
    for($i=0; $i < count($arr); $i++){
        $data .= $_POST[$i].",";
    }
    $data .= "\n";
    $temp = fopen("uploads/usable.csv", "a");
    fwrite($temp, $data);
    fclose($temp);
    fclose($f);
    echo "Entry Added";
    echo "<script>window.location = \"display.php\";</script>";
}
else echo "Error Occured, please try again.";


?>

<?php require_once("footer.php");?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>