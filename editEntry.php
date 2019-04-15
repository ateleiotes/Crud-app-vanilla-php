<?php require_once("head.php"); ?>

<?php

// Make a temporary file to write to
$temp = fopen("uploads/temp.csv", 'w');
$id = key($_POST['toEdit']);
//require_once("getHeaders.php");

$f = fopen("uploads/usable.csv","r");


$myFile = "uploads/usable.csv";
$lines = file($myFile); //file to array
$data1 = $lines[1];
$arr = explode(',', $data1);
// get id key, count & all the post values
if (isset($id)) {
    $count = 0;
    echo "<br>";
    echo "<br>";
    echo "<div class='container justify-content-center text-white border border-secondary rounded'>";
    echo "<br>";
    echo "<h5>Edit the necessary fields</h5>";

    echo "<form method='post' action='editEntry.php'>";
    echo "<input type='hidden' name='toEdit' value='$id'><br>";
    $id2 = $id + 1;
    while (($line = fgetcsv($f)) !== false) {
        if ($count == ($id2)) {
            for ($x = 0; $x < count($line); $x++) {
                // Using header arr, generate labels and names for post values
                echo $arr[$x].":"."<br>". " <input type='text' name='$x " . "abc" . "' value='$line[$x]'><br>";
            }
        }
        $count++;
    }
    echo "<br>";
    echo "<input type='submit' name='submit' class='btn btn-dark'>";
    echo "</form></div></div>";
}



if(isset($_POST['submit'])) {
    $c = 0;
    $data = array();
    for ($i = 0; $i < count($arr); $i++) {
        $data[] = $_POST[$i.'_abc'];
    }
    // Get the array  and save it to temp file
    while (($line = fgetcsv($f)) !== false) {
        if ($_POST['toEdit'] + 1 == $c) {
            fputcsv($temp, $data);
        }else{
            fputcsv($temp, $line);
        }
        $c++;
    }
    fclose($f);
    unlink("uploads/usable.csv");
    fclose($temp);
    rename("uploads/temp.csv", "uploads/usable.csv");
    echo "<script>window.location = \"display.php\";</script>";
}
?>

<?php require_once("footer.php");?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>








