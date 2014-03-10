<?php
$id = $_POST["id"];
$c = $_POST["c"];
$o = fopen($id.".tex", 'w+');
$w = fwrite($o, $c);
$r = fread($o, 100000);
fclose($o);
if($w){
    echo 'File saved';
} else {
    echo 'Error saving file';
}
?> 
