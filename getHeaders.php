<?php

function getHeaders()
{
    global $title;
    global $arr;
    global $f;
    $f = fopen("uploads/usable.csv","r");

    // Get title of csv document and place as header of page
    $title = fgets($f);

    $myFile = "uploads/usable.csv";
    $lines = file($myFile); //file to array
    $data = $lines[1];
    $arr = explode(',', $data);
}
getHeaders();
?>

<a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a>
