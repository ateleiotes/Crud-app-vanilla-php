
<?php

function deleteEntry ()
{

    // Necessary variables
    $temp = fopen("uploads/temp.csv", 'w');
    $f = fopen("uploads/usable.csv", "r");
    $id = key($_POST['clicked']);
    $count = 0;

    echo "<br>";
    if(!$f) {
        echo "File wasn't found";
    }
    elseif (!isset($id)) {
        echo "Entry wasn't found";
    }
    else {
        while (($line = fgetcsv($f)) !== false) {
            $count++;
            if ($id == ($count-2)) {
                continue;
            }
            fputcsv($temp, $line);

        }
        fclose($f);
        unlink("uploads/usable.csv");
        fclose($temp);
        rename("uploads/temp.csv", "uploads/usable.csv");
        echo "Entry Deleted";
        echo "<script>window.location = \"display.php\";</script>";
    }

}

deleteEntry();
?>
<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>
