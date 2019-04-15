<?php require_once("head.php"); ?>

<?php
$id = 0;
// Open file stream; mode read
$f = fopen("uploads/usable.csv","r");

// Get table headers and put into usable array
require_once ("getHeaders.php");




echo "<div class='container-fluid' >";
echo "<br>";
echo "<h6 class='text-white'>$title</h6>";
echo "<form method='post'>
      <div class='row'>
      <div class='col'>
      <button type='submit' value='Add' name='Add' class='btn btn-dark' formaction='addEntry.php' >
      <img src='assets/img/add.png' alt='Add button' height='30' width='30'></button></div>";
echo "<div class='col'><button class='btn-dark'><a href='uploads/usable.csv' download><img src='assets/img/download.png' alt='Download button' height='30' width='30'></a></button></div></div></form>";

echo "<br>";
      echo "<form method='post'>";
      echo "<table class='table table-dark table-striped' style='width: 100%'>";
      echo "<tr class='border-bottom border-dark'>";
echo "<th>ID</th>";
// Get headers of file and only print those;
for($j = 0; $j < count($arr); $j++) {
    echo "<th>$arr[$j]</th>";
}

echo "<th></th>";
echo "<th><input type='text' name='Search'>
              <button type='submit' class='btn btn-dark float-lg-right' formaction='search.php'>
                <img src='assets/img/search.png' alt='search button' height='30' width='30'>
              </button>
      </th>";
echo "</tr>";



// Retrieve and display the data into table
fgetcsv($f);
                        while (($line = fgetcsv($f)) !== false) {
                            $id++;

                                echo "<tr>";
                                echo "<td>" . $id . "</td>";
                                foreach ($line as $cell) {

                                    echo "<td>" . htmlspecialchars($cell) . "</td>";

                                }
                                echo "<td><button type='submit' value='clicked' name='clicked[$id]' class='btn btn-dark' formaction='deleteEntry.php'>
                                        <img src='assets/img/delete.png' alt='delete button' height='30' width='30'>
                                      </button></td>";
                                echo "<td><button type='submit' value='toEdit' name='toEdit[$id]' class='btn btn-dark' formaction='editEntry.php'>
                                        <img src='assets/img/edit.png' alt='Edit button' height='30' width='30'>
                                      </button></td>";
                                echo "</tr>\n";

                    }
fclose($f);
echo "</table></form>"; // End of table

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "</div>";
echo "</div>";
?>

<?php require_once("footer.php");?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>

