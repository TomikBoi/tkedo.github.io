<?php

$file = fopen('text-file.txt', "w");

fwrite($file, "Write data to file");
fclose($file);
?>