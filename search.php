<?php require_once("head.php"); ?>
<?php
$query = 103;
//$_POST['Search'];

$f = fopen("uploads/usable.csv","r");

require_once("getHeaders.php");

echo "<div class='container-fluid' >";
echo "<h6 class='text-white'>$title</h6>";
echo "<br>";
echo "<br>";
echo "<form method='post'>";
echo "<table class='table table-dark table-striped' style='width: 100%'>";
echo "<tr class='border-bottom border-dark'>";


echo "<th>ID</th>";
for($j = 0; $j < count($arr); $j++) {
    echo "<th>$arr[$j]</th>";
}

echo "<th></th>";

// Home Button
echo "<th><button type='submit' value='Home' name='Home' class='btn btn-dark' formaction='display.php'>
            <img src='assets/img/home.png' alt='Edit button' height='30' width='30'>
          </button>
      </th>";
echo "</tr>";

$id = 0;
if (($fp = fopen("uploads/usable.csv", "r")) !== false) {

    while (($row = fgetcsv($fp)) !== false) {
        // Searches every row
        $id++;
        foreach ($row as $cell) {
            // If matches to query
            if ($cell == $query) {
                echo "<tr>";
                echo "<td>".$id."</td>";
                //prints those lines
                foreach ($row as $cell1) {
                    echo "<td>" . htmlspecialchars($cell1) . "</td>";
                }
                echo "<td><button type='submit' value='clicked' name='clicked[$id]' class='btn btn-dark' formaction='deleteEntry.php'>
                                        <img src='assets/img/delete.png' alt='delete button' height='30' width='30'>
                                      </button></td>";
                echo "<td><button type='submit' value='toEdit' name='toEdit[$id]' class='btn btn-dark' formaction='editEntry.php'>
                                        <img src='assets/img/edit.png' alt='Edit button' height='30' width='30'>
                                      </button></td>";
                echo "</tr>";
            }


        }

    }
    fclose($f);
    echo "</table></form>"; // End of table
    echo "<form method='post' action='addEntry.php'>
      <button type='submit' value='Add' name='Add' class='btn btn-dark' >
      <img src='assets/img/add.png' alt='Add button' height='30' width='30'></button></form>";
    echo "<form><button class='btn-dark'><a href='uploads/usable.csv' download><img src='assets/img/download.png' alt='Download button' height='30' width='30'></a></button></form>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "</div>";
    echo "</div>";
}
?>
<?php require_once("footer.php");?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>